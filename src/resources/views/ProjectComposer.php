<?php

namespace Deegitalbe\LaravelTrustupIoProjects\resources\views;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints\ProjectEndpointContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Illuminate\View\View;

class ProjectComposer
{

    protected $projects;


    public function __construct(ProjectEndpointContract $projects)
    {
        $this->projects = $projects;
    }

    public function compose(View $view)
    {
        $view->with('projects', $this->projects->index(app()->make(IndexRequestContract::class))->getProjects());
    }
}
