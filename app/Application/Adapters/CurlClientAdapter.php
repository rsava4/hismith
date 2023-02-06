<?php

namespace App\Application\Adapters;

use App\Application\Adapters\RssClientAdapter;

final class CurlClientAdapter extends RssClientAdapter
{

    public function __construct()
    {
        if(!extension_loaded('curl')) {
            throw new \Exception('Расширение curl не найдено, включите его в настройках сервера');
        }
    }

    public function getFeed(string $url):string
    {
        $client = curl_init();
        curl_setopt($client, CURLOPT_URL, $url);
        curl_setopt($client, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64)');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($client);
        $curlInfo = curl_getinfo($client);
        curl_close($client);
        $this->writeResultToLog('GET', $curlInfo['url'], $curlInfo['http_code'], $result, round($curlInfo['total_time']*1000));
        
        return $result;
    }


}