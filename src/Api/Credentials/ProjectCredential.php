<?php

namespace Deegitalbe\LaravelTrustupIoProjects\Api\Credentials;

use Deegitalbe\ServerAuthorization\Credential\AuthorizedServerCredential;
use Henrotaym\LaravelApiClient\Contracts\RequestContract;
use Henrotaym\LaravelApiClient\JsonCredential;

class ProjectCredential extends JsonCredential
{
    public function prepare(RequestContract &$request)
    {
        parent::prepare($request);
        $request->setBaseUrl('trustup-io-projects/api');
    }
}
