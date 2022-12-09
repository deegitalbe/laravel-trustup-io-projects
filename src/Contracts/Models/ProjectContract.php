<?php
namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Models;

use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;

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
     * Getting manager ids.
     * 
     * @return Collection<int, int>
     */
    public function getManagerIds(): Collection;

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