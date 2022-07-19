<?php

namespace App\Admin;

class AppConst
{
    public static $SEAT_TYPE = [
        1 => '上舱',
        2 => '中舱',
        3 => '下舱',
        4 => '贵宾',
        5 => '卧铺',
    ];
    public static $CHANNEL =
        [
            'FG' => '飞猪',
            'MT' => '美团',
            'XC' => '携程',
            'PT' => '定制'
        ];
    public static $TYPE =
        [
            1 => '去程',
            2 => '返程',
        ];
    public static $STATUS =
        [
            0 => '待抢票',
            1 => '抢票失败',
            2 => '出票成功',
            3 => '已经退款',
            4 => '其他',

        ];
    public static $MESSAGE_STATUS =
        [
            0 => '未发送',
            1 => '通知成功',
            2 => '通知失败',
            3 => '其他',

        ];

    public static $OPERATOR
        = [
            '甜甜',
            '李哥',
            '悦悦',
            '肥仔',
            '肥四',
            '荷荷',
            '甜菜',
            '薇薇姑姑',
            '小姑姑'
        ];

}
