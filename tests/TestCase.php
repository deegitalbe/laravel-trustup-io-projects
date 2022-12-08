<?php
namespace Deegitalbe\LaravelTrustupIoProjects\Tests;

use Deegitalbe\LaravelTrustupIoProjects\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\LaravelTrustupIoProjects\Providers\LaravelTrustupIoProjectsServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            LaravelTrustupIoProjectsServiceProvider::class
        ];
    }
}