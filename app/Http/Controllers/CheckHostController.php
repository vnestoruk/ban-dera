<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Models\Target;
use App\Models\TargetStatus;
use App\Http\Controllers\CurlController as CURL;

class CheckHostController extends Controller
{
    /**
     * Links to check host service
     *
     * @var array
     */
    public array $HOST_CHECK_ENDPOINT = [
        'http' => 'http://check-host.net/check-http?host=',
        'result' => 'http://check-host.net/check-result/',
    ];


    public function __invoke()
    {
        $resultRequest = $this->makeCheckResultRequest();
        $httpRequest = $this->makeCheckHttpRequest();

        return response()->json([
            'http' => $httpRequest,
            'result' => $resultRequest
        ]);
    }

    protected function makeCheckHttpRequest()
    {
        $target = Target::whereNull('check_host_request_id')
            ->orderBy('updated_at', 'asc')
            ->first();

        if (is_null($target)) return null;

        $curl = new CURL;
        $response = $curl->getJSON($this->HOST_CHECK_ENDPOINT['http'] . $target->url . '/');
        $target->check_host_request_id = $response->{'request_id'};

        $target->save();
        return $response->{'request_id'};
    }

    protected function makeCheckResultRequest()
    {
        $target = Target::whereNotNull('check_host_request_id')
            ->orderBy('updated_at', 'desc')
            ->first();

        if (is_null($target)) return null;

        $curl = new CURL;
        $response = $curl->getJSON($this->HOST_CHECK_ENDPOINT['result'] . $target->check_host_request_id);

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
            }
        }

        $target->save();
        return $data ?? [];
    }
}
