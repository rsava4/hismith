<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Application\RssFeedFactory;
use App\Application\Services\ParseRssService;

class RssParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing rss feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss';
        $xml = RssFeedFactory::build(RssFeedFactory::CLIENT_TYPE_CURL)->getFeed($url);
        app(ParseRssService::class)->writeRssFeedToDB($xml);
        return 0;
    }
}
