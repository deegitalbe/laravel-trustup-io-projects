<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{

    public $resource;




    public function toArray($request)
    {
        return [
            "id" => $this->resource->getId(),
            "uuid" => $this->resource->getUuid(),
            "app_key" => $this->resource->getAppKey(),
            "title" => $this->resource->getTitle(),
            "image" => $this->resource->getImage(),
            "url" => $this->resource->getUrl(),
            "icon" => $this->resource->getIcon(),
            "group" => $this->resource->getGroup(),
            "manager_ids" => $this->resource->getManagerIds(),
            "managers" => $this->resource->getManagers(),
        ];
    }
}
