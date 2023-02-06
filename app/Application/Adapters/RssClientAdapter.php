<?php

namespace App\Application\Adapters;

use App\Application\Repositories\RequestLogRepository;

abstract class RssClientAdapter
{
    abstract public function getFeed(string $url): string;

    protected function writeResultToLog(string $method, string $url, int $httpCode, string $body = '', float $requestTime = 0)
    {
        $logRepository = app(RequestLogRepository::class);

        $logRepository->save([
            'method' => $method,
            'url' => $url,
            'http_code' => $httpCode,
            'response_body' => $body,
            'total_time' => $requestTime
        ]);
    }

}