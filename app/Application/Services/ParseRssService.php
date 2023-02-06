<?php

namespace App\Application\Services;

use App\Application\Repositories\RssPostRepository;
use App\Application\Services\DownloadImageService;


final class ParseRssService
{    
    /**
     * writeRssFeedToDB
     *
     * @param  string $xml
     * @return void
     */
    public function writeRssFeedToDB(string $xml): void
    {
        $feed = simplexml_load_string($xml);
        foreach ($feed->xpath('//item') as $item){
            $post = [
                'guid' => (string) $item->guid,
                'title' => (string) $item->title,
                'author' => (string) $item->author,
                'description' => (string) $item->description,
                'image' => DownloadImageService::run($item),
                'published_at' => (new \DateTimeImmutable((string) $item->pubDate))->format('Y-m-d H-i-s')
            ];
            app(RssPostRepository::class)->save($post);
        }
    }
    
}