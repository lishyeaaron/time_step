<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Combo;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ComboController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Combo(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('combo');
            $grid->column('desc');
            $grid->column('price');
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
        return Show::make($id, new Combo(), function (Show $show) {
            $show->field('id');
            $show->field('combo');
            $show->field('desc');
            $show->field('price');
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
        return Form::make(new Combo(), function (Form $form) {
            $form->display('id');
            $form->text('combo');
            $form->text('desc');
            $form->text('price');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
