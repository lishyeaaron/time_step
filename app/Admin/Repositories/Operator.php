<?php

namespace App\Admin\Repositories;

use App\Models\Operator as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Operator extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
