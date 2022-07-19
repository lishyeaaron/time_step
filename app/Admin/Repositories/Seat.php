<?php

namespace App\Admin\Repositories;

use App\Models\Seat as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Seat extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
