<?php

namespace Database\Seeders;

use App\Models\Node;
use App\Models\Target;
use App\Models\TargetStatus;
use App\Models\Proxy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CheckHostController as CheckHost;
use App\Http\Controllers\CurlController as CURL;

class TargetSeeder extends Seeder
{
    /**
     * How to work with this list, if you want to add new targets:
     * 1) For VSCode, install: https://github.com/Tyriar/vscode-sort-lines
     * 2) Open `targets.txt` and add new website to the end of the list
     * 3) Select all the lines
     * 4) Press CTRL + SHIFT + P, type `sort` and select "Sort lines (unique ascending, case insensetive)"
     * OR you can use https://www.online-utility.org/text/sort.jsp with "Remove duplicates" option
     *
     * Then paste new list instead old one.
     *
     * NOTE: Please convert cyrillic domains to punycode (https://en.wikipedia.org/wiki/Punycode)
     * Browser will convert those automatically, so `http://банк.рф/` will be `http://xn--80ab2al.xn--p1ai/`
     *
     * @var string  Resources storage path to primary targets file
     */
    private string $_TARGETS = "armory\\targets.txt";

    /**
     * Russian subnets file to check up on
     * There are some subnets that should be omitted, i.e. `Cloudflare Warp` ranges
     *
     * @var string  Resources storage path to primary subnets file
     */
    private string $_SUBNETS = "armory\\subnets_ru.csv";


    /**
     * Run the database seeds.
     * *TIP: Use `php artisan migrate:fresh --seed` to rebuild all targets from scratch
     *
     * @return void
     */
    public function run()
    {
        $targetsFile = Storage::disk('resources')->get($this->_TARGETS);
        $targetsArray = preg_split('/\R/', trim($targetsFile)); // Turn each line into array item
        $targetsCount = count($targetsArray);

        $this->command->info($targetsCount . ' targets are being prepared, please wait...');
        $this->command->getOutput()->progressStart($targetsCount);

        $urls = [];
        foreach ($targetsArray as $target) {
            $urls[] = $target;
            if (!Target::where('url', '=', $target)->exists()) {
                Target::create(['url' => $target]);
            }
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();


        // Select populated targets, starting from most oldest (to refresh them)
        $oldestTargets = Target::inRandomOrder()
            ->whereNull('check_host_request_id')
            ->orderBy('updated_at', 'asc')
            ->limit(100) // Optimal for 10 secs timeout. Higher limit = higher timeout
            ->get();

        // Populate target hosts (`request_id`)
        $checkHost = new CheckHost;
        $hostsForTarget = $hostResultsForTarget = [];
        foreach ($oldestTargets as $target) {
            $hostsForTarget[] = [
                'host_url' => $checkHost->HOST_CHECK_ENDPOINT['http'] . $target->url . '/',
                'url' => $target->getAttributes()['url'] // For later model call usage
            ];
        }

        $curl = new CURL;

        if ($hostsForTarget) {
            $checkedHosts = $curl->multicurl(
                $hostsForTarget,
                $proxyType = 'http',
                $this->command
            );
            foreach ($checkedHosts as $response) {
                $requestId = $response['data']['request_id'] ?? '';

                $usedProxy = $response['proxy'] ?? '';
                $usedUrl = $response['url'] ?? '';

                if ($requestId) {
                    $this->command->info($usedUrl . ' -> ' . $usedProxy . ' -> ' . $requestId);
                    $target = Target::where('url', $usedUrl)
                        ->whereNull('check_host_request_id')
                        ->first();
                    $target->check_host_request_id = $requestId;
                    $target->save();

                    $hostResultsForTarget[] = [
                        'host_url' => $checkHost->HOST_CHECK_ENDPOINT['result'] . $requestId . '/',
                        'url' => $usedUrl,
                        'proxy' => $usedProxy // Using same proxy from earlier requests as it is alive
                    ];
                }
            }
        }

        if ($hostResultsForTarget) {
            $checkedResultsHosts = $curl->multicurl(
                $hostResultsForTarget,
                $proxyType = 'http',
                $this->command
            );
            foreach ($checkedResultsHosts as $response) {
                if (isset($response['data']) && is_array($response['data'])) {
                    $target = Target::where('url', $response['url'])->first();
                    $target->check_host_request_id = null;
                    $target->status()->delete();
                    foreach ($response['data'] as $node => $data) {
                        if (!is_null($data) && isset($data[0])) {
                            $status = new TargetStatus;

                            $status->error = $data[0][0] === 0;
                            $status->response_time = round($data[0][1], 3);
                            $status->message = $data[0][2];
                            $status->status_code = $data[0][3];
                            $status->ip_address = $data[0][4];
                            $status->node()->associate(Node::where('host', $node)->first());

                            $target->status()->save($status);
                        }
                    }
                    $target->save();
                }
            }
        }
    }
}
