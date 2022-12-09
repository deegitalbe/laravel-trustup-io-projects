<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Providers;

use Deegitalbe\LaravelTrustupIoProjects\Facades\Package as TrustupIoProjectsFacade;
use Deegitalbe\LaravelTrustupIoProjects\Package;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class LaravelTrustupIoProjectsServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        //
    }

    protected function addToBoot(): void
    {
        // @TODO use view composers to load projects automatically to your master view.
        // @see https://laravel.com/docs/9.x/views#view-composers
        $this->loadViewsFrom(__DIR__ . '/../resources/views', TrustupIoProjectsFacade::viewPrefix());
    }
}
