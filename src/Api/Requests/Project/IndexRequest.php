<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Api\Requests\Project;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\Api\Requests\Project\IndexRequestContract;
use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectGroup;

/**
 * Representing an index request on project endpoint.
 */
class IndexRequest implements IndexRequestContract
{
    /** @var Collection<int, ProjectAppKey> */
    protected Collection $appKeys;

    /** @var Collection<int, ProjectGroup> */
    protected Collection $groups;
    /**
     * Retrieving models matching given app keys only.
     * 
     * @param Collection $appKeys
     * @return static
     */
    public function setAppKeys(Collection $appKeys): IndexRequestContract
    {
        $this->appKeys = $appKeys;
        return $this;
    }

    /**
     * Adding given app keys to those that should be matched.
     * 
     * @param ProjectAppKey $appKey
     * @return static
     */
    public function addAppKey(ProjectAppKey $appKey): IndexRequestContract
    {
        $this->getAppKeys()->push($appKey);
        return $this;
    }

    /**
     * Getting app keys that should limit request.
     * 
     * @return Collection
     */
    public function getAppKeys(): Collection
    {
        return $this->appKeys ?? $this->appKeys = collect();
    }

    /**
     * Telling if request should limit models retrieved by app keys.
     * 
     * @return bool
     */
    public function hasAppKeys(): bool
    {
        return $this->getAppKeys()->isNotEmpty();
    }

    public function setGroups(Collection $groups): IndexRequestContract
    {
        $this->groups = $groups;
        return $this;
    }

    public function addGroup(ProjectGroup $group): IndexRequestContract
    {
        $this->getGroups()->push($group);
        return $this;
    }

    public function getGroups(): Collection
    {
        return $this->groups ?? $this->groups = collect();
    }

    public function hasGroups(): bool
    {
        return $this->getGroups()->isNotEmpty();
    }

    /**
     * Telling request to load managers or not based on given boolean.
     * 
     * @param bool $isLoadingManagers
     * @return static
     */
    public function loadManagers(bool $isLoadingManagers): IndexRequestContract
    {
        return $this;
    }

    /**
     * Telling if request is loading managers or not.
     * 
     * @return bool
     */
    public function isLoadingManagers(): bool
    {
        return true;
    }
}
