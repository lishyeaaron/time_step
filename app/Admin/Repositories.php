<?php

namespace App\Admin\Repositories;

use App\Models\ as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Repositories extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
