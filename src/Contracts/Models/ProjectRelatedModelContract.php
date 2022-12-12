<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Contracts\Models;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\ExternalModelRelatedModelContract;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Contracts\Models\Relations\ExternalModelRelationContract;

interface ProjectRelatedModelContract extends ExternalModelRelatedModelContract
{
    public function belongsToProject(string $idProperty, string $name = null): ExternalModelRelationContract;


    public function hasManyProjects(string $idsProperty, string $name = null): ExternalModelRelationContract;
}
