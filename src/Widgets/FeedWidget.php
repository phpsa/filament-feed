<?php

namespace Phpsa\FilamentFeed\Widgets;

use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class FeedWidget extends Widget
{
    use CanPoll;

    protected static string $view = 'filament-feed::filament.widgets.feed';

    protected function getViewData(): array
    {
        return [
            'feeds' => $this->getFeeds()
        ];
    }

    protected function getFeeds(): array
    {
        return collect(Config::get('filament-feed.feeds', []))
            ->map(fn($feed, $key) => $this->fetchFeed($feed, $key))
            ->filter()
            ->toArray();
    }

    protected function fetchFeed(array $feed, string $key): ?array
    {

        $feedUrl = $feed['url'] ?? null;
        if ($feedUrl === null) {
            return null;
        }
        $limit = $feed['limit'] ?? 5;
        $refresh = $feed['refresh'] ?? 300;

        $key = 'php-f-feed-' . md5($feedUrl . $limit);

        $data = Cache::remember($key, $refresh, fn () => $this->getFeed($feedUrl, $limit));
        return  $data;
    }

    public function getFeed(string $url, int $limit): array
    {
        $simplePie = new \SimplePie();
        $simplePie->enable_cache(false);
        $simplePie->set_feed_url($url);
        $simplePie->init();

        return [
            'title'     => $simplePie->get_title(),
            'permalink' => $simplePie->get_permalink(),
            'items'     => $simplePie->get_items(0, $limit),
        ];
    }
}
