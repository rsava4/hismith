<?php

namespace App\Application;

use App\Application\Adapters\CurlClientAdapter;
use App\Application\Adapters\GuzzleClientAdapter;
use App\Application\Adapters\RssClientAdapter;

final class RssFeedFactory
{

    public const CLIENT_TYPE_CURL = 'curl';
    public const CLIENT_TYPE_GUZZLE = 'guzzle';

    public static function build(string $clientType): RssClientAdapter
    {
        $client = null;
        switch($clientType){
            case self::CLIENT_TYPE_GUZZLE:
                $client = new GuzzleClientAdapter();
                break;
            default:
                $client = new CurlClientAdapter();
                break;
                
        }
        return $client;
    }
} 