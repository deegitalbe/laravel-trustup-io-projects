<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectGroup;

/**
 * Representing an index request on project endpoint.
 */
interface IndexRequestContract
{
    /**
     * Retrieving models matching given app keys only.
     * 
     * @param Collection<int, ProjectAppKey> $appKeys
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
     * @return Collection<int, ProjectAppKey> 
     */
    public function getAppKeys(): Collection;

    /**
     * Telling if request should limit models retrieved by app keys.
     * 
     * @return bool
     */
    public function hasAppKeys(): bool;


    /**
     * Retrieving models matching given groups only.
     * 
     * @param Collection<int,ProjectGroup> $groups
     * @return static
     */
    public function setGroups(Collection $groups): IndexRequestContract;

    /**
     * Adding given groups to those that should be matched.
     * 
     * @param ProjectGroup $group
     * @return static
     */
    public function addGroup(ProjectGroup $group): IndexRequestContract;

    /**
     * Getting groups that should limit request.
     * 
     * @return Collection<int,ProjectGroup>
     */
    public function getGroups(): Collection;

    /**
     * Telling if request should limit models retrieved by app keys.
     * 
     * @return bool
     */
    public function hasGroups(): bool;

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
