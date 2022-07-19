<?php

namespace App\Admin\Tool;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Widgets\Form;

class Image extends AbstractTool
{
    protected function script()
    {
        $url = request()->fullUrlWithQuery(['gender' => '_gender_']);

        return <<<JS
$('input:radio.user-gender').change(function () {
    var url = "$url".replace('_gender_', $(this).val());

    Dcat.reload(url);
});
JS;
    }

    public function render()
    {
        Admin::script($this->script());

        $options = [
            'all'   => 'All',
            'm'     => 'Male',
            'f'     => 'Female',
        ];

        return view('admin.tools.image', compact('options'));
    }
}
