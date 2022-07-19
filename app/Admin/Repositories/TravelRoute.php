<?php

namespace App\Admin\Repositories;

use App\Models\TravelRoute as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class TravelRoute extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
