<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Models;



use Illuminate\Support\Collection;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectAppKey;
use Deegitalbe\LaravelTrustupIoAuthClient\Contracts\Models\TrustupUserContract;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectContract;
use Deegitalbe\LaravelTrustupIoProjects\Enums\ProjectGroup;
use Deegitalbe\LaravelTrustupIoProjects\Exceptions\InvalidAppKey;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

/**
 * Representing a project.
 */
class Project implements ProjectContract
{
    protected array $attributes;
    /**
     * Getting id.
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    /**
     * Getting uuid.
     * 
     * @return uuid
     */
    public function getUuid(): string
    {
        return $this->attributes['uuid'];
    }

    /**
     * Getting app key
     * 
     * @return 
     */
    public function getAppKey(): ?ProjectAppKey
    {
        return ProjectAppKey::tryFrom($this->attributes['app_key']);
    }

    public function getRawAppKey(): string
    {
        return $this->attributes['app_key'];
    }

    private function checkValidAppKey(): bool
    {
        if (ProjectAppKey::tryFrom($this->attributes['app_key'])) return true;

        return false;
    }

    /**
     * Getting title.
     * 
     * @return string
     */
    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    /**
     * Getting image.
     * 
     * @return string
     */
    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    /**
     * Getting url.
     * 
     * @return string
     */
    public function getUrl(): string
    {
        return $this->attributes['url'];
    }

    /**
     * Getting icon.
     * 
     * @return string
     */
    public function getIcon(): string
    {
        return $this->attributes['icon'];
    }

    /**
     * Getting group
     * 
     * @return 
     */
    public function getGroup(): ProjectGroup
    {
        return ProjectGroup::from($this->attributes['group']);
    }

    /**
     * Getting manager ids.
     * 
     * @return ?Collection<int, int>
     */
    public function getManagerIds(): ?Collection
    {
        return collect($this->attributes['manager_ids']);
    }

    /**
     * Getting managers.
     * 
     * @return ?Collection<int, TrustupUserContract>
     */
    public function getManagers(): ?Collection
    {
        return collect($this->attributes['managers'])->map(
            fn (array $attribute) =>
            app()->make(TrustupUserContract::class)->fill($attribute)
        );
    }

    public function getExternalRelationIdentifier(): string|int
    {
        return $this->getAppKey()->value;
    }

    /**
     * Telling if project is matching given app key.
     * 
     * @return bool
     */
    public function is(ProjectAppKey $appKey): bool
    {
        return $this->getAppKey() === $appKey;
    }

    /**
     * Filling model based on given attributes.
     * 
     * @return static
     */
    public function fill(array $attributes): ProjectContract
    {
        $this->attributes = $attributes;


        if (!$this->checkValidAppKey()) {
            $exception = new InvalidAppKey();
            $exception->setMissingAppKey($this->getRawAppKey());
            report($exception);
        }

        return $this;
    }
}
