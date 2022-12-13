# laravel-trustup-io-projects

## Installation

```shell
composer require deegitalbe/laravel-trustup-io-projects
```

### Add environment variables

```shell
TRUSTUP_IO_PROJECTS_URL=

```

### Preparing your models (optional)

If you have relationships with projects, your model should look like this

```php
<?php

namespace App\Models;

use Deegitalbe\LaravelTrustupIoProjects\Contracts\Models\ProjectRelatedModelContract;
use Deegitalbe\LaravelTrustupIoProjects\Traits\Models\IsProjectRelatedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model implements ProjectRelatedModelContract
{
    use IsProjectRelatedModel;

    public function getExternalRelationNames(): array
    {
        return [
            'projects'
        ];
    }

    public function projects(){
        return $this->hasManyProjects('project_ids');
    }

    public function getProjects(){
        return $this->getExternalModels('projects');
    }
}

```

### Exposing your models by creating a resource (optional)

If you wanna expose your model, here is an example resource based on previous section model

```php
<?php
namespace App\Http\Resources;

use Deegitalbe\LaravelTrustupIoExternalModelRelations\Traits\Resources\IsExternalModelRelatedResource;
use Deegitalbe\LaravelTrustupIoProjects\Resource\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource {

  use IsExternalModelRelatedResource;

  public function toArray($request)
  {
    return [

      'projects' => ProjectResource::collection($this->whenExternalRelationLoaded('projects'))

    ];
  }
}
```

### Eager load collections

Only one request will be performed even if you load multiple relations ⚡⚡⚡⚡

```php
<?php
namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use App\Models\Test;
use Deegitalbe\LaravelTrustupIoProjects\Resource\ProjectResource;
use Deegitalbe\LaravelTrustupIoExternalModelRelations\Collections\ExternalModelRelatedCollection;

class TestController extends Controller{

  public function index()
    {
      /** @var ExternalModelRelatedCollection */
        $tests = Test::all();
        $tests->loadExternalRelations('projects');

        return TestResource::collection(($tests));
    }
}
```

## Usage

### Endpoint

```php
    $enpoint = app()->make(ProjectEndpointContract::class);
    $request = app()->make(IndexRequestContract::class);

    $group = ProjectGroup::INTERNAL;
    $appKey = ProjectAppKey::TRUSTUP;

    $request->addGroup($group)->addAppKey($appKey);

    $projects = $endpoint->index($request)->getProjects();
```

### Layout

You can extend package view to display available projects in a sidebar

```php
    @extends('trustup-io-projects::master')

    @section('content')
        //YOUR CONTENT
    @endsection
```
