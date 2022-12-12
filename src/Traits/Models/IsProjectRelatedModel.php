<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Traits\Models;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Models\IsExternalModelRelatedModel;
use Deegitalbe\LaravelTrustupIoProjects\Models\ProjectRelationLoadingCallback;

trait IsProjectRelatedModel
{
    use IsExternalModelRelatedModel;

    public function belongsToProject(string $idProperty, string $name = null): ExternalModelRelationContract
    {
        return $this->belongsToExternalModel(
            app()->make(ProjectRelationLoadingCallback::class),
            $idProperty,
            $name
        );
    }

    public function hasManyProjects(string $idsProperty, string $name = null): ExternalModelRelationContract
    {
        return $this->hasManyExternalModels(
            app()->make(ProjectRelationLoadingCallback::class),
            $idsProperty,
            $name
        );
    }
}
