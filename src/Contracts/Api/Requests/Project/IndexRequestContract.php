<?php
namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;

/**
 * Representing an index request on project endpoint.
 */
interface IndexRequestContract
{
    /**
     * Retrieving models matching given app keys only.
     * 
     * @param Collection $appKeys
     * @return static
     */
    public function setAppKeys(Collection $appKeys): IndexRequestContract;

    /**
     * Adding given app keys to those that should be matched.
     * 
     * @param ProjectAppKey $appKey
     * @return static
     */
    public function addAppKey(ProjectAppKey $appKey): IndexRequestContract;

    /**
     * Getting app keys that should limit request.
     * 
     * @return Collection
     */
    public function getAppKeys(): Collection;

    /**
     * Telling if request should limit models retrieved by app keys.
     * 
     * @return bool
     */
    public function hasAppKeys(): bool;

    /**
     * Telling request to load managers or not based on given boolean.
     * 
     * @param bool $isLoadingManagers
     * @return static
     */
    public function loadManagers(bool $isLoadingManagers): IndexRequestContract;

    /**
     * Telling if request is loading managers or not.
     * 
     * @return bool
     */
    public function isLoadingManagers(): bool;
}