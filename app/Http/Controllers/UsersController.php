<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public $userApi;

    public function __construct(Application $app)
    {
        $this->userApi = $app->user;
    }

    //users
    public function users()
    {
        $users = $this->userApi->lists();
        return $users;
    }

    //获取个人信息
    public function user($openId)
    {
        $user = $this->userApi->get($openId);

        return $user;
    }

    //修改用户的备注信息
    public function remark()
    {
        $res = $this->userApi->remark('oEs1mwQc_GAW9CAU1TCP2Icm5Ykw','小小高');
        if($res) {
            return '修改用户备注信息成功';
        }
        return '修改用户备注信息失败';
    }
}
