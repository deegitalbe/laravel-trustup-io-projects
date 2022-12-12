<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Models;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;
use Deegitalbe\LaravelTrustupIoAuthClient\Contracts\Models\TrustupUserContract;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectGroup;

/**
 * Representing a project.
 */
interface ProjectContract
{
    /**
     * Getting id.
     * 
     * @return int
     */
    public function getId(): int;

    /**
     * Getting uuid.
     * 
     * @return uuid
     */
    public function getUuid(): string;

    /**
     * Getting app key
     * 
     * @return 
     */
    public function getAppKey(): ProjectAppKey;

    /**
     * Getting title.
     * 
     * @return string
     */
    public function getTitle(): string;

    /**
     * Getting image.
     * 
     * @return string
     */
    public function getImage(): string;

    /**
     * Getting url.
     * 
     * @return string
     */
    public function getUrl(): string;

    /**
     * Getting icon.
     * 
     * @return string
     */
    public function getIcon(): string;

    /**
     * Getting group
     * 
     * @return 
     */
    public function getGroup(): ProjectGroup;

    /**
     * Getting manager ids.
     * 
     * @return ?Collection<int, int>
     */
    public function getManagerIds(): ?Collection;

    /**
     * Getting managers.
     * 
     * @return ?Collection<int, TrustupUserContract>
     */
    public function getManagers(): ?Collection;

    /**
     * Telling if project is matching given app key.
     * 
     * @return bool
     */
    public function is(ProjectAppKey $appKey): bool;

    /**
     * Filling model based on given attributes.
     * 
     * @return static
     */
    public function fill(array $attributes): ProjectContract;
}
