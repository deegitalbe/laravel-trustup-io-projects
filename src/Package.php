<?php

namespace Deegitalbe\LaravelTrustupIoProjects;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\PackageContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class Package extends VersionablePackage implements PackageContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-io-projects";
    }

    public function viewPrefix()
    {
        return "trustup-io-projects";
    }
}
