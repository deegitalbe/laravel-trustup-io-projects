<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Api\Responses\Project;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project\IndexResponseContract;
use Illuminate\Support\Collection;
use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectContract;

/**
 * Representing an index response on project endpoint.
 */
class IndexResponse implements IndexResponseContract
{
    protected TryResponseContract $response;
    /**
     * Setting underlying response.
     * 
     * @param TryResponseContract $response
     * @return static
     */
    public function setResponse(TryResponseContract $response): IndexResponseContract
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Getting underlying response.
     * 
     * @return TryResponseContract
     */
    public function getResponse(): TryResponseContract
    {
        return $this->response;
    }

    /**
     * Getting related projects.
     * 
     * @return Collection<int, ProjectContract>
     */
    public function getProjects(): Collection
    {
        if ($this->getResponse()->failed()) {
            return collect();
        }
        $array = $this->getResponse()->response()->get(true);
        return collect($array['data'])->map(
            fn (array $attribute) =>
            app()->make(ProjectContract::class)->fill($attribute)
        );
    }
}
