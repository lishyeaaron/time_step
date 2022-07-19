<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ChannelOrder;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ChannelOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ChannelOrder(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('trade_no');
            $grid->column('channel');
            $grid->column('combo');
            $grid->column('schedule_seat_type');
            $grid->column('schedule_date');
            $grid->column('schedule_time');
            $grid->column('amount');
            $grid->column('remark');
            $grid->column('users');
            $grid->column('is_del');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
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
        return Show::make($id, new ChannelOrder(), function (Show $show) {
            $show->field('id');
            $show->field('trade_no');
            $show->field('channel');
            $show->field('combo');
            $show->field('schedule_seat_type');
            $show->field('schedule_date');
            $show->field('schedule_time');
            $show->field('amount');
            $show->field('remark');
            $show->field('users');
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
        return Form::make(new ChannelOrder(), function (Form $form) {
            $form->display('id');
            $form->text('trade_no');
            $form->text('channel');
            $form->text('combo');
            $form->text('schedule_seat_type');
            $form->text('schedule_date');
            $form->text('schedule_time');
            $form->text('amount');
            $form->text('remark');
            $form->text('users');
            $form->text('is_del');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
