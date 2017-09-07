<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public $broadcast;

    public function __construct(Application $app)
    {
        $this->broadcast = $app->broadcast;
    }

    //给所有用户发送消息
    public function sendAll()
    {
        // 别名方式
        $this->broadcast->sendText("大家好！欢迎使用 EasyWeChat。");
        return 'send_all_done';
    }

    //给指定用户发送消息
    public function sendTwo()
    {
        $this->broadcast->send('content','你好啊',[
            'oEs1mwQc_GAW9CAU1TCP2Icm5Ykw',
            'oEs1mwRdYgkNQf1AGmw7JuNYuDXI'
        ]);
        return 'send_two_done';
    }
}
