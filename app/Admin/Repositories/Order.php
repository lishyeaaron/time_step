<?php

namespace App\Admin\Repositories;

use App\Models\Ticket;
use App\Models\Order as Model;
use Dcat\Admin\Form;
use Dcat\Admin\Repositories\EloquentRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Order extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    /**
     * 新增记录.
     *
     * @param Form $form
     * @return mixed
     */
    public function store(Form $form)
    {
        $result = null;

        DB::beginTransaction();
        try {
            $model   = $this->model();
            $updates = $form->updates();

            foreach ($updates as $column => $value) {
                $model->setAttribute($column, $value);
            }

            $result = $model->save();


            if (!$result && isset($updates['users']) && $updates['users']) {
                echo '';
            } else {
                $users = json_decode($updates['users']);
                Ticket::where('trade_no', $updates['trade_no'])->update(['is_del' => 1]);
                foreach ($users as $user) {
                    Ticket::updateOrCreate([
                        'trade_no'    => $updates['trade_no'],
                        'user_name'   => $user->user_name,
                        'user_phone'  => $user->user_phone ?? $updates['user_phone'],
                        'user_id_num' => $user->user_id_num,
                    ], [
                        'channel'            => $updates['channel'],
                        'user_phone'         => $updates['user_phone'],
                        'combo'              => $updates['combo'],
                        'schedule_seat_type' => $updates['schedule_seat_type'],
                        'schedule_date'      => $updates['schedule_date'],
                        'operator_user_name' => isset($user->operator_user_name) ? $user->operator_user_name : '',
                        //'type'               => $updates['type'],
                        'is_del'             => 0
                    ]);
                }
            }
            DB::commit();
            return $this->model()->getKey();
        } catch (\Exception $e) {
            dump($e);
            DB::rollback();

        }

    }
}
