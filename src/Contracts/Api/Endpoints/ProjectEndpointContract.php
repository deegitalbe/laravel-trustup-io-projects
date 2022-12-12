<?php
namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project\IndexResponseContract;

/**
 * Representing project endpoint.
 */
interface ProjectEndpointContract
{
    /**
     * Getting projects matching request.
     * 
     * @param IndexRequestContract $request
     * @return IndexResponseContract
     */
    public function index(IndexRequestContract $request): IndexResponseContract;
}