<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Resource;

use Deegitalbe\LaravelTrustupIoAuthClient\Resources\TrustupUserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectContract;

class ProjectResource extends JsonResource
{

    /** @var ProjectContract */
    public $resource;




    public function toArray($request)
    {
        return [
            "id" => $this->resource->getId(),
            "uuid" => $this->resource->getUuid(),
            "app_key" => $this->resource->getAppKey() ?? $this->resource->getRawAppKey(),
            "title" => $this->resource->getTitle(),
            "image" => $this->resource->getImage(),
            "url" => $this->resource->getUrl(),
            "icon" => $this->resource->getIcon(),
            "group" => $this->resource->getGroup(),
            "manager_ids" => $this->resource->getManagerIds(),
            "managers" => TrustupUserResource::collection($this->resource->getManagers()),
        ];
    }
}
