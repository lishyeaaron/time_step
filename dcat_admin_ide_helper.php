<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection combo
     * @property Grid\Column|Collection desc
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection trade_no
     * @property Grid\Column|Collection channel
     * @property Grid\Column|Collection schedule_seat_type
     * @property Grid\Column|Collection schedule_date
     * @property Grid\Column|Collection schedule_time
     * @property Grid\Column|Collection user_phone
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection users
     * @property Grid\Column|Collection is_del
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection user_name
     * @property Grid\Column|Collection user_id_num
     * @property Grid\Column|Collection cost
     * @property Grid\Column|Collection confirm_date
     * @property Grid\Column|Collection seat_type
     * @property Grid\Column|Collection seat_no
     * @property Grid\Column|Collection fight_no
     * @property Grid\Column|Collection confirm_time
     * @property Grid\Column|Collection operator_user_name
     * @property Grid\Column|Collection confirm_operator_user_name
     * @property Grid\Column|Collection compensation
     * @property Grid\Column|Collection result_remark
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection message_notify_status
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection combo(string $label = null)
     * @method Grid\Column|Collection desc(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection trade_no(string $label = null)
     * @method Grid\Column|Collection channel(string $label = null)
     * @method Grid\Column|Collection schedule_seat_type(string $label = null)
     * @method Grid\Column|Collection schedule_date(string $label = null)
     * @method Grid\Column|Collection schedule_time(string $label = null)
     * @method Grid\Column|Collection user_phone(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection users(string $label = null)
     * @method Grid\Column|Collection is_del(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection user_name(string $label = null)
     * @method Grid\Column|Collection user_id_num(string $label = null)
     * @method Grid\Column|Collection cost(string $label = null)
     * @method Grid\Column|Collection confirm_date(string $label = null)
     * @method Grid\Column|Collection seat_type(string $label = null)
     * @method Grid\Column|Collection seat_no(string $label = null)
     * @method Grid\Column|Collection fight_no(string $label = null)
     * @method Grid\Column|Collection confirm_time(string $label = null)
     * @method Grid\Column|Collection operator_user_name(string $label = null)
     * @method Grid\Column|Collection confirm_operator_user_name(string $label = null)
     * @method Grid\Column|Collection compensation(string $label = null)
     * @method Grid\Column|Collection result_remark(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection message_notify_status(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection combo
     * @property Show\Field|Collection desc
     * @property Show\Field|Collection price
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection path
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection trade_no
     * @property Show\Field|Collection channel
     * @property Show\Field|Collection schedule_seat_type
     * @property Show\Field|Collection schedule_date
     * @property Show\Field|Collection schedule_time
     * @property Show\Field|Collection user_phone
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection users
     * @property Show\Field|Collection is_del
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection user_name
     * @property Show\Field|Collection user_id_num
     * @property Show\Field|Collection cost
     * @property Show\Field|Collection confirm_date
     * @property Show\Field|Collection seat_type
     * @property Show\Field|Collection seat_no
     * @property Show\Field|Collection fight_no
     * @property Show\Field|Collection confirm_time
     * @property Show\Field|Collection operator_user_name
     * @property Show\Field|Collection confirm_operator_user_name
     * @property Show\Field|Collection compensation
     * @property Show\Field|Collection result_remark
     * @property Show\Field|Collection status
     * @property Show\Field|Collection message_notify_status
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection combo(string $label = null)
     * @method Show\Field|Collection desc(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection trade_no(string $label = null)
     * @method Show\Field|Collection channel(string $label = null)
     * @method Show\Field|Collection schedule_seat_type(string $label = null)
     * @method Show\Field|Collection schedule_date(string $label = null)
     * @method Show\Field|Collection schedule_time(string $label = null)
     * @method Show\Field|Collection user_phone(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection users(string $label = null)
     * @method Show\Field|Collection is_del(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection user_name(string $label = null)
     * @method Show\Field|Collection user_id_num(string $label = null)
     * @method Show\Field|Collection cost(string $label = null)
     * @method Show\Field|Collection confirm_date(string $label = null)
     * @method Show\Field|Collection seat_type(string $label = null)
     * @method Show\Field|Collection seat_no(string $label = null)
     * @method Show\Field|Collection fight_no(string $label = null)
     * @method Show\Field|Collection confirm_time(string $label = null)
     * @method Show\Field|Collection operator_user_name(string $label = null)
     * @method Show\Field|Collection confirm_operator_user_name(string $label = null)
     * @method Show\Field|Collection compensation(string $label = null)
     * @method Show\Field|Collection result_remark(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection message_notify_status(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
