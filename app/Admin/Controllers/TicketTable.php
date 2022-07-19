<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Grid\LazyRenderable;
use App\Admin\Repositories\NullRepository;
use Dcat\Admin\Layout\Content;
use App\Admin\Repositories\Ticket;
use App\Admin\AppConst;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class TicketTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new Ticket(), function (Grid $grid) {
            $grid->disableActions();
            $grid->disableBatchActions();
            $grid->disableBatchDelete();
            $grid->disableRefreshButton();
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->disablePagination();
            $grid->disableRowSelector();
            $grid->disableColumnSelector();
            $grid->model()->where('trade_no', $this->trade_no);
            $grid->column('seat_type');
            $grid->column('seat_no');
            $grid->column('fight_no');
            $grid->column('schedule_time');
            $grid->column('confirm_time');
            $grid->column('operator_user_name');
            $grid->column('confirm_operator_user_name');
            $grid->column('compensation');
            $grid->column('result_remark');
            $grid->column('status');
            $grid->column('message_notify_status');
            $grid->column('id', '编辑')->display(function () {
                $id   = $this->id;
                $href = '/admin/tickets/' . $id . '/edit';
                return "
<a class='button' href=$href>编辑</a>
";
            });

        });
    }
}
