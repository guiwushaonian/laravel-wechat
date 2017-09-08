<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    public $menu;

    public function __construct(Application $app)
    {
        $this->menu = $app->menu;
    }

    //获取菜单列表
    public function getMenus()
    {
        $data['all'] = $this->menu->all();
        $data['current'] = $this->menu->current();

        return $data;
    }
}
