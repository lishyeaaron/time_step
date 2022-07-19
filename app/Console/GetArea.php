<?php

namespace App\Console;

use Dcat\Admin\Models\Administrator;
use Illuminate\Console\Command;


class GetArea extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'get_areas';

    /**
     * @return void
     */
    public function handle()
    {
        $url = 'https://diqu.gezhong.vip/api.php';
        echo file_get_contents($url);
    }
}
