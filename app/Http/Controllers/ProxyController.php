<?php

namespace App\Http\Controllers;

use App\Models\Proxy;
use App\Http\Controllers\CurlController as CURL;

class ProxyController extends Controller
{
    public function getRandomProxy(string $proxyType = 'any', $excludeDead = false): string
    {
        $proxy = Proxy::inRandomOrder();
        if ($proxyType) {
            if (in_array($proxyType, Proxy::PROXY_TYPES)) {
                $proxy->where('proxy_type', $proxyType);
            }
        }
        if ($excludeDead) $proxy->alive();

        return $proxy->untested()->first()->url;
    }

    public function getAllProxy()
    {
        return Proxy::inRandomOrder()->get();
    }

    public function markAsAlive($ip_port): int
    {
        $proxy = Proxy::where('ip_port', $ip_port)->first();
        $proxy->is_alive = 1;
        $proxy->save();
        return 1;
    }

    public function markAsDead($ip_port): int
    {
        $proxy = Proxy::where('ip_port', $ip_port)->first();
        $proxy->is_alive = 0;
        $proxy->save();
        return 0;
    }

    public function getProxyInfo($proxyhost, $proxyuserpwd)
    {
        $curl = new CURL;

        $curl->getJSON('http://ipinfo.io/json');
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://ipinfo.io/json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXY, $proxyhost);
        if ($proxyuserpwd) curl_setopt($ch, CURLOPT_PROXYUSERPWD, (string) $proxyuserpwd);

        $response = curl_exec($ch);
        $error = curl_errno($ch) ? curl_error($ch) : '';
        curl_close($ch);

        return $error ? $error : (array)json_decode($response);
    }
}
