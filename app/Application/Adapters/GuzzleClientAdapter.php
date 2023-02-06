<?php

namespace App\Application\Adapters;

use App\Application\Adapters\RssClientAdapter;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

final class GuzzleClientAdapter extends RssClientAdapter
{

    private $client;

    public function __construct()
    {
        $this->client = new Client(); 
    }

    public function getFeed(string $url):string
    {
        $response = $this->client->get($url, [
            'on_stats' => function (TransferStats $stats) {
                if ($stats->hasResponse()) {
                    $this->writeResultToLog('GET', $stats->getEffectiveUri(), $stats->getResponse()->getStatusCode(), $stats->getResponse()->getBody()->getContents(), $stats->getTransferTime()*1000);
                } 
            }
        ]);

        $result = $response->getBody()->getContents();

        return $result;
    }
}
