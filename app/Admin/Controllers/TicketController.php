<?php

namespace App\Admin\Controllers;
use App\Models\Combo;
use App\Models\Operator;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Admin\Renderable\PostTable;
use App\Admin\Repositories\NullRepository;
use App\Admin\Tool\Image;
use App\Admin\Controllers\TicketTable;
use Dcat\Admin\Layout\Content;
use App\Admin\Repositories\Ticket;
use Dcat\Admin\Widgets\Card;
use App\Admin\AppConst;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;

class TicketController extends AdminController
{
    use PreviewCode;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function create(Content $content)
    {
        return $content
            ->title('船票录入')
            ->description('创建')
            ->body($this->newline())
            ->body($this->form());
    }
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
    protected function grid()
    {

        return Grid::make(new Ticket(), function (Grid $grid) {
//            $grid->tools(new Image());

            #$grid->model()->where('is_del',0);
            $grid->quickSearch(['trade_no', 'user_id_num','user_name', 'user_phone','operator_user_name','confirm_operator_user_name'
            ])->placeholder('快捷搜索...');
            $grid
                ->tableCollapse(false);
            $grid->showColumnSelector();
            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->selector(function (Grid\Tools\Selector $selector) {
                $selector->select('schedule_seat_type', '舱位', AppConst::$SEAT_TYPE);
                $selector->select('status', '状态', AppConst::$STATUS);
                $selector->select('schedule_date', '日期', [
                    date('Y-m-d', strtotime('-1 day')) => date('Y-m-d', strtotime('-1 day')),
                    date('Y-m-d')                      => date('Y-m-d') . "(当天)",
                    date('Y-m-d', strtotime('+1 day')) => date('Y-m-d', strtotime('+1 day')),
                    date('Y-m-d', strtotime('+2 day')) => date('Y-m-d', strtotime('+2 day')),
                    date('Y-m-d', strtotime('+3 day')) => date('Y-m-d', strtotime('+3 day')),
                    date('Y-m-d', strtotime('+4 day')) => date('Y-m-d', strtotime('+4 day')),
                ]);
            });

            $area = json_decode((Storage::disk('app')->get('area.json'))) ;
            $new_array = array();
            foreach($area as $data) {

                $new_array[$data->code] =$data->name;

            }



            $grid->column('trade_no','身份证归属地')->display(function () use ($new_array){
return "
$this->user_name $this->user_phone
<br>身份证$this->user_id_num
<br>订单号$this->trade_no";})->width('230')->filter(Grid\Column\Filter\Like::make());

            $grid->column('user_id_num')->help('身份证归属地')->substr(0, 6)->using($new_array);

            #$grid->column('id')->sortable();
//            $grid->column('trade_no', '订单号')->filter(Grid\Column\Filter\Like::make())->width('50px');;;
            $grid->column('combo')->filter(Grid\Column\Filter\In::make($this->combos()));
//            #$grid->column('channel');
//            $grid->column('user_name')->copyable()->filter(Grid\Column\Filter\Like::make());
//            $grid->column('user_id_num')->copyable()->filter(Grid\Column\Filter\Like::make());
//            $grid->column('user_phone')->filter(Grid\Column\Filter\Like::make());
            //$grid->column('price')->display('异步表格')->modal('弹窗标题', TicketTable::make(['id'=>1]));;
//            $grid->column('price')
//                ->display(Factory::create()->name)
//                ->expand(TicketTable::make()->simple());
            // 允许混合使用多个“display”方法


            #$grid->column('cost');
            $grid->column('schedule_date')->display(function () {
                $time = date('H:i',strtotime($this->schedule_time));
                return "
<b>$this->schedule_date</b>
<br>
<b>$time</b>
";
            })->filter(
                Grid\Column\Filter\Between::make()->date()
            );
            $grid->column('schedule_seat_type')->using(AppConst::$SEAT_TYPE)->filter(    Grid\Column\Filter\In::make(AppConst::$SEAT_TYPE)
            );
            $grid->column('remark')
                ->if(function () {
                    return !empty($this->remark);
                })
                ->display('查看') // 设置按钮名称
                ->modal(function ($modal) {
                    // 设置弹窗标题
                    $modal->title('备注');

                    $card = new Card(null, $this->remark);

                    return "<div style='padding:10px 10px 0'>$card</div>";
                })
                ->else()
                ->display('<i>无</i>');
//            $grid->column('remark')->display(function () {
//                $s = mb_substr($this->remark, 0, 5, 'utf-8');
//                return "
//<b  title=$this->remark>$s</b>
//<br>";
//            });

            #$grid->column('confirm_date')->editable();
            //            $grid->column('confirm_time')->editable('time');
            //            $type = AppConst::$SEAT_TYPE;
            $grid->column('seat_type')
                ->select(AppConst::$SEAT_TYPE,true)->filter(    Grid\Column\Filter\In::make(AppConst::$SEAT_TYPE)
                );
            $grid->column('seat_no')->editable();
            $grid->column('fight_no')->editable();


            $grid->column('operator_user_name')->select($this->operators());
            #$grid->column('operator_id');
            #$grid->column('confirm_operator_nickname');
            $grid->column('confirm_operator_user_name')->editable();
            #$grid->column('confirm_operator_id');
            $grid->column('compensation')->editable();
            $grid->column('result_remark')->editable();
            $grid->column('status')->select(AppConst::$STATUS,true);
            $grid->column('message_notify_status')->using(AppConst::$MESSAGE_STATUS)
                ->label([
                    0 => 'default',
                    1 => 'success',
                    2 => 'danger',
                    3 => 'warning',
                ]);
            //$grid->fixColumns(-1);


            $grid->hideColumns(['user_id_num','message_notify_status']);
            $grid->filter(function($filter){

                // 在这里添加字段过滤器


                $filter->like('trade_no');
                $filter->like('channel');
                $filter->like('user_name');
                $filter->like('user_id_num');
                $filter->like('user_phone');
                $filter->like('combo');
                $filter->like('schedule_seat_type');
                $filter->like('schedule_date');
                $filter->likefield('operator_user_name');
                $filter->like('confirm_operator_user_name');
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
        return Show::make($id, new Ticket(), function (Show $show) {
            $show->field('id');
            $show->field('trade_no');
            $show->field('channel');
            $show->field('user_name');
            $show->field('user_id_num');
            $show->field('user_phone');
            $show->field('combo');
            $show->field('price');
            $show->field('cost');
            $show->field('schedule_seat_type');
            $show->field('schedule_date');
            $show->field('confirm_date');
            $show->field('seat_type');
            $show->field('seat_no');
            $show->field('fight_no');
            $show->field('schedule_time');
            $show->field('confirm_time');
            $show->field('operator_user_name');
            $show->field('operator_id');
            $show->field('confirm_operator_nickname');
            $show->field('confirm_operator_user_name');
            $show->field('confirm_operator_id');
            $show->field('compensation');
            $show->field('remark');
            $show->field('result_remark');
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
        return Form::make(new Ticket(), function (Form $form) {
            $form->hidden('seat_type');
            $form->hidden('status');
            $form->hidden('message_notify_status','短信通知');
            $form->block(8, function (Form\BlockForm $form) {
                // 设置标题
                $form->title('出行信息');

                // 显示底部提交按钮
                $form->showFooter();

                // 设置字段宽度
                $form->width(9, 2);

                $form->column(6, function (Form\BlockForm $form) {
                    $form->date('confirm_date')->default(date('Y-m-d'), true);
                    $form->time('confirm_time')->default('00:00', true);
                    $form->select('seat_type')->options(AppConst::$SEAT_TYPE)->default(0, true);
                    $form->text('seat_no')->default(0, true);;
                    $form->text('fight_no')->default(0, true);

                });

                $form->column(6, function (Form\BlockForm $form) {
                    $form->text('operator_user_name')->default('未分配', true);;;
                    $form->text('confirm_operator_user_name')->default('未分配', true);;
                    $form->decimal('cost')->default(0, true);;
                    $form->decimal('compensation')->default(0, true);
                    $form->textarea('result_remark')->default('无', true);


                });
                $form->display('id');
            });
            $form->block(4, function (Form\BlockForm $form) {
                // 设置标题
                $form->title('客户信息');
                $form->text('user_name');
                $form->text('user_id_num');
                $form->text('user_phone');


                $form->next(function (Form\BlockForm $form) {
                    $form->title('套餐信息');
                    $form->text('trade_no', '订单ID')->disable();
                    $form->select('channel', '渠道')->options(AppConst::$CHANNEL);
                    $form->date('schedule_date', '期望日期');
                    $form->time('schedule_time', '期望时间');
                    $form->select('schedule_seat_type', '期望舱位')->options(AppConst::$SEAT_TYPE)->default(0, true);;
                    $form->text('combo', '套餐')->default('默认值', true);
                    $form->decimal('price', '价格')->default(0, true);
                    $form->textarea('remark', '备注')->default('无', true);


                });
            });

        });
    }
    public function update($id)
    {
        return $this->form()->update($id);
    }


}
