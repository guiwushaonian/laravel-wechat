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

    //添加普通菜单
    public function create()
    {
        $buttons = [
            [
                "type" => "click",
                "name" => "今日图片",
                "key"  => "TODAY_IMAGE"
            ],
            [
                "name"       => "二级菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "登录",
                        "url"  => "https://wechat.52xpp.com/user"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "VOTE_GOOD"
                    ],
                ],
            ],
        ];
        $this->menu->add($buttons);
        return '添加普通菜单成功';
    }
}
