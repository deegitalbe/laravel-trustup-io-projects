<?php

namespace Deegitalbe\LaravelTrustupIoProjects\resources\views;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints\ProjectEndpointContract;
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
        $view->with('projects', $this->projects);
    }
}
