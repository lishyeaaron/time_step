<?php

namespace App\Admin\Repositories;

use App\Models\Combo as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Combo extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
