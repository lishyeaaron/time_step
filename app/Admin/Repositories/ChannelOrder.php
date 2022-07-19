<?php

namespace App\Admin\Repositories;

use App\Models\ChannelOrder as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ChannelOrder extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
