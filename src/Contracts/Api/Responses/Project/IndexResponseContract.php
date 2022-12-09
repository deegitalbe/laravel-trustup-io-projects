<?php
namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Responses\Project;

use Illuminate\Support\Collection;
use Henrotaym\LaravelApiClient\Contracts\TryResponseContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectContract;

/**
 * Representing an index response on project endpoint.
 */
interface IndexResponseContract
{
    /**
     * Setting underlying response.
     * 
     * @param TryResponseContract $response
     * @return static
     */
    public function setResponse(TryResponseContract $response): IndexResponseContract;

    /**
     * Getting underlying response.
     * 
     * @return TryResponseContract
     */
    public function getResponse(): TryResponseContract;

    /**
     * Getting related projects.
     * 
     * @return Collection<int, ProjectContract>
     */
    public function getProjects(): Collection;
}