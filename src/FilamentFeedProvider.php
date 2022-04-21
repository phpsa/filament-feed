<?php

namespace Phpsa\FilamentFeed;

use Filament\PluginServiceProvider;
use Phpsa\FilamentFeed\Widgets\FeedWidget;
use Spatie\LaravelPackageTools\Package;

class FilamentFeedProvider extends PluginServiceProvider
{
    public static string $name = 'filament-feed';

    protected array $widgets = [
        FeedWidget::class
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-feed')->hasViews()->hasConfigFile();
    }
}
