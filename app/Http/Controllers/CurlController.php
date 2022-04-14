<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command as Command;
use App\Http\Controllers\ProxyController as Proxy;
use Curl\MultiCurl;

class CurlController extends Controller
{
    /**
     * Returns data as JSON, ordinary GET request
     * Uses proxy
     *
     * @see https://curl.se/libcurl/c/CURLOPT_PROXY.html
     *
     * @param string $url
     * @param integer $proxyType
     * @return object JSON
     */
    public function getJSON(string $url, string $proxyType = '')
    {
        $curl = curl_init();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json'
            ),
        ];

        if ($proxyType) {
            // If `proxyType` is an actual proxy IP
            if (strpos($proxyType, ':') !== false) {
                $options[CURLOPT_PROXY] = $proxyType;
            } else {
                $proxy = new Proxy;
                $options[CURLOPT_PROXY] = $proxy->getRandomProxy($proxyType);
            }
        }

        curl_setopt_array($curl, $options);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        return $response;
    }

    /**
     * Ordinary GET request without any proxies
     *
     * @param string $url
     * @return mixed
     */
    public function get(string $url, string $proxyType = '')
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36',
        ]);

        if ($proxyType) {
            // If `proxyType` is an actual proxy IP
            if (strpos($proxyType, ':') !== false) {
                $options[CURLOPT_PROXY] = $proxyType;
            } else {
                $proxy = new Proxy;
                $options[CURLOPT_PROXY] = $proxy->getRandomProxy($proxyType);
            }
        }

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    /**
     * Retrieves data and curl connection info for an array of one or more urls
     * using curl_multi_*. Input order & array key equal output order & array key.
     * Returns 2-dimensional array containing url data & curl info.
     * @param array $urls
     * @return array $res
     */
    public function multicurl($urls, string $proxyType = '', Command $command)
    {
        // The curl multi handle.
        $mh = curl_multi_init();

        // Array of curl handles.
        $chs = [];

        // Result array which will be returned.
        $res = [];

        // Array of used proxies, needed for reuse if they appear to be alive
        $urlProxies = [];

        // Proxy
        $proxy = new Proxy;

        // Create a curl handle for each url and add it to the $mh.
        foreach ($urls as $key => $url) {
            $chs[$key] = curl_init();

            $header[0] = "Accept: application/json";

            curl_setopt($chs[$key], CURLOPT_URL, $url['host_url']);
            curl_setopt($chs[$key], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($chs[$key], CURLOPT_ENCODING, '');
            curl_setopt($chs[$key], CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($chs[$key], CURLOPT_MAXREDIRS, 3);
            curl_setopt($chs[$key], CURLOPT_TIMEOUT, 10);
            curl_setopt($chs[$key], CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($chs[$key], CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($chs[$key], CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($chs[$key], CURLOPT_HTTPHEADER, $header);
            curl_setopt($chs[$key], CURLOPT_VERBOSE, true);
            curl_setopt($chs[$key], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36');

            if ($proxyType) {
                $currentProxy = $url['proxy'] ?? $proxy->getRandomProxy($proxyType, $excludeDead = true);
                $urlProxies[$url['url']] = $currentProxy;
                curl_setopt(
                    $chs[$key],
                    CURLOPT_PROXY,
                    $currentProxy
                );
            }
            curl_multi_add_handle($mh, $chs[$key]);
        }

        // Loop through $mh while there are active connections,
        // but put to sleep so we don't eat up too much unnecessary cpu power.
        $active = null;
        $command->info('[CURL] ' . count($urls) . ' target hosts are checking, please wait...');
        $command->getOutput()->progressStart(count($urls));

        //execute the multi handle
        do {
            // to prevent cpu overload
            usleep(1337);

            $status = curl_multi_exec($mh, $active);
            if ($active) {
                curl_multi_select($mh);
            }

            while (false !== ($info = curl_multi_info_read($mh))) {
                $http_code = curl_getinfo($info['handle'], CURLINFO_HTTP_CODE);

                $codes[$http_code][] = [
                    'url' => curl_getinfo($info['handle'], CURLINFO_EFFECTIVE_URL),
                    'ctype' => curl_getinfo($info['handle'], CURLINFO_CONTENT_TYPE),
                    'time' => curl_getinfo($info['handle'], CURLINFO_TOTAL_TIME),
                    'ip' => curl_getinfo($info['handle'], CURLINFO_PRIMARY_IP),
                    'port' => curl_getinfo($info['handle'], CURLINFO_PRIMARY_PORT)
                ];

                $command->getOutput()->progressAdvance();
            }
        } while ($active && $status == CURLM_OK);

        // Store url contents and connection info into result array
        foreach ($chs as $key => $ch) {
            $res[$key]['data'] = curl_multi_getcontent($ch);
            $res[$key]['info'] = curl_getinfo($ch);
            $res[$key]['url'] = $urls[$key]['url'];

            // If proxy will work out well, use it for next requests for same IDs
            if (isset($urlProxies[$res[$key]['url']])) {
                $res[$key]['proxy'] = (strpos(
                    $urlProxies[$res[$key]['url']],
                    '://'
                ) !== false) ? explode('://', $urlProxies[$res[$key]['url']])[1] : $urlProxies[$res[$key]['url']];
            }

            // Some proxies may fail, we will leave those targets for the next run
            if (
                $res[$key]['info']['http_code'] !== 200
                && (substr($res[$key]['data'], 0, 2) !== '{"')
            ) {
                $proxy->markAsDead($res[$key]['proxy']);
            } else {
                $proxy->markAsAlive($res[$key]['proxy']);
                $res[$key]['data'] = json_decode($res[$key]['data'], true);
            }
            curl_multi_remove_handle($mh, $ch);
        }

        //dump($codes); // Uncomment to see full info

        curl_multi_close($mh);

        $command->getOutput()->progressFinish();
        $command->info('[' . count($res) . '/' . count($urls) . '] target hosts parsed');

        // Some extended info
        if (isset($codes[503])) {
            $command->info('[503] ' . count($codes[503]) . ' service was unavailable');
            unset($codes[503]);
        }

        if (isset($codes[200])) {
            $command->info('----------------------------------------------------');
            $command->info('[OK] ' . count($codes[200]) . ' parsed successfully');
            if (isset($codes[0])) {
                $command->info('[!] ' . count($codes[0]) . ' failed due to PROXY/CONNECT timeout');
                unset($codes[0]);
            }
            $command->info('----------------------------------------------------');
            unset($codes[200]);
        }

        // Showing dump of some other unusual links
        if (!empty($codes)) {
            $command->info('[?] Some other codes to investigate: ');
            foreach ($codes as $code => $data) {
                $command->info('[' . $code . '] ' . count($codes[$code]) . ' urls with such code');
            }
        }

        return $res;
    }
}
