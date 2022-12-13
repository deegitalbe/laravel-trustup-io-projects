<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Api\Endpoints;

use Deegitalbe\LaravelTrustupIoProjects\Api\credentials\ProjectCredential;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Endpoints\ProjectEndpointContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project\IndexResponseContract;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectGroup;
use Henrotaym\LaravelApiClient\Contracts\ClientContract;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;


class ProjectEndpoint implements ProjectEndpointContract
{

    protected ClientContract $client;

    public function __construct(ClientContract $client, ProjectCredential $credential)
    {

        $this->client = $client->setCredential($credential);
    }

    public function index(IndexRequestContract $request): IndexResponseContract
    {

        /** @var RequestContract */
        $implement = app()->make(RequestContract::class);

        $implement->setVerb('GET')->setUrl('projects');

        if ($request->hasAppKeys()) {
            $implement->addQuery([
                'app_keys' => $request->getAppKeys()->map(fn (ProjectAppKey $appKey) => $appKey->value)->all(),
            ]);
        }
        if ($request->hasGroups()) {
            $implement->addQuery([
                'groups' => $request->getGroups()->map(fn (ProjectGroup $group) => $group->value)->all(),
            ]);
        }

        $response = $this->client->try($implement, "Cannot get all projects");


        return app()->make(IndexResponseContract::class)->setResponse($response);
    }
}
