<?php

namespace App\Admin\Controllers;

use App\Admin\AppConst;
use App\Admin\Repositories\Order;
use App\Admin\Repositories\Ticket;
use App\Models\Combo;
use App\Models\Operator;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Faker\Factory;
use Illuminate\Support\Collection;

class OrderController extends AdminController
{
    protected $combos = [];
    protected $operators = [];

    protected function combos()
    {
        if (empty($this->combos)) {
            $newArr = [];
            $res    = array_values(Combo::all()->pluck('combo')->toArray());
            foreach ($res as $k => $v) {
                $newArr[$v] = $v;
            }
            $this->combos = $newArr;
            return $this->combos;
        } else {
            return $this->combos;
        }
    }

    protected function operators()
    {
        if (empty($this->operators)) {
            $newArr = [];
            $res    = array_values(Operator::all()->pluck('name')->toArray());
            foreach ($res as $k => $v) {
                $newArr[$v] = $v;
            }
            $this->operators = $newArr;
            return $this->operators;
        } else {
            return $this->operators;
        }
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        return Grid::make(new Order(), function (Grid $grid) {
            $combos = $this->combos();
            $grid->column('trade_no')->display(function () {
                $id   = $this->trade_no;
                $href = '/admin/tickets?trade_no=' . $id;
                return "
<a class='button' href=$href>$id</a>
";
            });
            $grid->column('id', '船票')
                ->display('查看船票')
                ->expand(function () {
                    $trade_no = $this->trade_no;
                    return TicketTable::make(['trade_no' => $trade_no])->simple();
                }
                );
            $grid->column('channel');
            $grid->column('combo');
            $grid->column('schedule_seat_type');
            $grid->column('schedule_date');
            $grid->column('schedule_time');
            $grid->column('amount', '价位');
            $grid->column('price');
            $grid->column('remark');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('trade_no');
            $show->field('channel');
            $show->field('combo');
            $show->field('schedule_seat_type');
            $show->field('schedule_date');
            $show->field('schedule_time');
            $show->field('amount');
            $show->field('price');
            $show->field('remark');
            $show->field('status');
            $show->field('message_notify_status');
            $show->field('is_del');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Form::make(new Order(), function (Form $form) {
            // 显示底部提交按钮
            $form->block(4, function (Form\BlockForm $form) {
                $combos = $this->combos();
                $form->showFooter();
                $form->title('套餐信息');
                $form->text('trade_no', '订单ID')->required();
                $form->select('channel', '渠道')->options(AppConst::$CHANNEL)->default('FG', true);
                $form->select('combo', '套餐')->options($combos)->default(0, true)->required();
                //$form->select('type', '类型')->options(AppConst::$TYPE)->default(1, true);
                $form->date('schedule_date', '期望日期')->required();
                $form->time('schedule_time', '期望时间')->required();
                $form->select('schedule_seat_type', '期望舱位')->options(AppConst::$SEAT_TYPE)->default(1, true);;

                $form->decimal('amount', '价格')->default(0, true);
                $form->decimal('user_phone', '联系方式')->default(0, true);
                $form->textarea('remark', '备注')->default('无', true);
            });
            $form->block(8, function (Form\BlockForm $form) {
                // 设置标题
                $form->title('游客信息');

                $form->table('users', '游客', function ($table) {
                    $table->text('user_name');
                    #$table->text('user_phone');
                    $table->text('user_id_num');
                    $table->select('operator_user_name')->options($this->operators());

                })->saving(function ($v) {
                    return json_encode($v);
                })->required();
            });
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store()
    {
        return $this->form()->store();
    }
}
