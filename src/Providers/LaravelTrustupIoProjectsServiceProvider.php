<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Providers;

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
        //
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'projectspackage');
    }
}
