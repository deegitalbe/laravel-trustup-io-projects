<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Providers;

use Deegitalbe\LaravelTrustupIoProjects\Api\Endpoints\ProjectEndpoint;
use Deegitalbe\LaravelTrustupIoProjects\Api\Requests\Project\IndexRequest;
use Deegitalbe\LaravelTrustupIoProjects\Api\Responses\Project\IndexResponse;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints\ProjectEndpointContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project\IndexResponseContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectContract;
use Deegitalbe\LaravelTrustupIoProjects\Facades\Package as TrustupIoProjectsFacade;
use Deegitalbe\LaravelTrustupIoProjects\Models\Project;
use Deegitalbe\LaravelTrustupIoProjects\Package;
use Deegitalbe\LaravelTrustupIoProjects\resources\views\ProjectComposer;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;
use Illuminate\Support\Facades\View;

class LaravelTrustupIoProjectsServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        //
        $this->app->bind(ProjectEndpointContract::class, ProjectEndpoint::class);
        $this->app->bind(IndexRequestContract::class, IndexRequest::class);
        $this->app->bind(ProjectContract::class, Project::class);
        $this->app->bind(IndexResponseContract::class, IndexResponse::class);
    }

    protected function addToBoot(): void
    {
        // @TODO use view composers to load projects automatically to your master view.
        // @see https://laravel.com/docs/9.x/views#view-composers
        $this->loadViewsFrom(__DIR__ . '/../resources/views', TrustupIoProjectsFacade::viewPrefix());

        View::composer(TrustupIoProjectsFacade::viewPrefix() . '::master',  ProjectComposer::class);
    }
}
