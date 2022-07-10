<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Models\Target;
use App\Models\TargetIpAddress;
use App\Models\TargetStatus;

class CheckHostController extends Controller
{

    public function __invoke()
    {
        $resultRequest = $this->makeCheckResultRequest();
        $httpRequest = $this->makeCheckHttpRequest();

        return response()->json([
            'http' => $httpRequest,
            'result' => $resultRequest
        ]);
    }

    /**
     * @return mixed|null
     */
    public function makeCheckHttpRequest() {

        $target = Target::whereNull('check_host_request_id')->orderBy('updated_at', 'asc')->first();

        if (is_null($target)) return null;

        $response = $this->curlRequest('https://check-host.net/check-http?host='.$target->url.'/');

        $target->check_host_request_id = $response->{'request_id'};

        foreach ($response->{'nodes'} as $node_host => $node_data) {
            Node::firstOrCreate(
                ['host' => $node_host],
                [
                    'asn' => $node_data[4],
                    'ip_address' => $node_data[3],
                    'location_iso' => $node_data[0],
                    'location_country' => $node_data[1],
                    'location_city' => $node_data[2]
                ],
            );
        }

        $target->save();

        return $response;
    }

    public function makeCheckResultRequest() {

        $target = Target::whereNotNull('check_host_request_id')->orderBy('updated_at', 'desc')->first();

        if (is_null($target)) return null;

        $response = $this->curlRequest('https://check-host.net/check-result/'.$target->check_host_request_id);

        $target->check_host_request_id = null;
        $target->status()->delete();

        foreach ($response as $node => $data) {
            if (!is_null($data) && !is_null($data[0])) {
                $status = new TargetStatus;

                $status->error = $data[0][0] === 0;
                $status->response_time = round($data[0][1], 3);
                $status->message = $data[0][2];
                $status->status_code = $data[0][3];
                $status->ip_address = $data[0][4];
                $status->node()->associate(Node::where('host', $node)->first());

                $target->status()->save($status);

                if (!is_null($data[0][4])) {
                    $target->ipAddress()->updateOrCreate([
                        'ip_address' => $data[0][4]
                    ], [
                        'type' => TargetIpAddress::_TYPE['IPv4'],
                        'ip_address' => $data[0][4],
                    ]);
                }
            }
        }

        $target->save();

        return $response;
    }

    protected function curlRequest($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        return $response;
    }

}
