<?php

namespace Database\Seeders;

use App\Models\Proxy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CurlController as CURL;

class ProxySeeder extends Seeder
{
    /**
     * Public or private proxy lists.
     * For now we only have one main & pretty fat list ;)
     *
     * @var array
     */
    private array $_PROXY_LISTS = [
        'https://raw.githubusercontent.com/porthole-ascend-cinnamon/proxy_scraper/main/proxies.txt',
        //'armory\\proxies_basic.txt', // Uncomment to add more
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('[CURL] Prepare to GET proxy lists...');

        $proxyLists = $this->prepareProxiesFromLists($this->_PROXY_LISTS);

        //Proxy::truncate(); // Uncomment for tests with `php artisan db:seed --class=ProxySeeder`

        foreach ($proxyLists as $list) {
            $this->command->getOutput()->progressStart(count($list));
            foreach ($list as $proxyAddress => $proxyType) {
                if (!Proxy::where('ip_port', '=', $proxyAddress)->exists()) {
                    Proxy::create([
                        'ip_port' => $proxyAddress,
                        'proxy_type' => $proxyType
                    ]);
                    $this->command->getOutput()->progressAdvance();
                }
            }
            $this->command->getOutput()->progressFinish();
        }
    }

    /**
     * Tries to get proxies from proxy lists, matching every line of parsed file
     *
     * @return array Proxies list
     */
    private function prepareProxiesFromLists(): array
    {
        $curl = new Curl;

        foreach ($this->_PROXY_LISTS as $proxyListURL) {
            // Proxy lists can be locally stored ot taken remotely
            $proxiesList = (strpos($proxyListURL, 'armory\\') !== false)
                ? $proxiesList = Storage::disk('resources')->get($proxyListURL)
                : $proxiesList = $curl->get($proxyListURL);

            $proxiesArray = preg_split('/\R/', trim($proxiesList));

            // Assuring IP against `SCHEME://IP:PORT` regex, returning `SCHEME` type
            $proxyTypes = array_map(
                function ($ip) {
                    if (strpos($ip, '://') !== false) {
                        return preg_match('/^([' . implode('|', Proxy::PROXY_TYPES) . ']+)?(:\/\/)?([^:]+:[^@]+@)?(\d{1,3}\.){3}\d{1,3}(:\d{1,5})?/', $ip, $m) ? $m[1] : 'http';
                    }
                    // Default type, if proxy list has no `SCHEME://` part
                    return 'http';
                },
                $proxiesArray
            );

            // Removing scheme, as it goes separately (or leaving IP intact if no scheme found)
            $proxiesArray = array_map(
                function ($ip) {
                    return (strpos($ip, '://') !== false) ? trim(explode('://', $ip)[1]) : $ip;
                },
                $proxiesArray
            );

            $proxies[] = array_combine($proxiesArray, $proxyTypes);
        }

        return $proxies;
    }
}
