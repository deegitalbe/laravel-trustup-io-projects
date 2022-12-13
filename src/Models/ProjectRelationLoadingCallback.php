<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Models;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationLoadingCallbackContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints\ProjectEndpointContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project\IndexResponseContract;
use Illuminate\Support\Collection;

class ProjectRelationLoadingCallback implements ExternalModelRelationLoadingCallbackContract
{

    protected ProjectEndpointContract $endpoint;


    public function __construct(ProjectEndpointContract $endpoint)
    {
        $this->endpoint = $endpoint;
    }


    public function load(Collection $identifiers): Collection
    {
        /** @var IndexRequestContract */
        $request = app()->make(IndexRequestContract::class);

        $request->setAppKeys($identifiers);
        return $this->endpoint->index($request)->getProjects();
    }
}
