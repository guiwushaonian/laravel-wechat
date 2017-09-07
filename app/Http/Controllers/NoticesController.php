<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public $notice;

    public function __construct(Application $app)
    {
        $this->notice = $app->notice;
    }

    public function notice()
    {
        $userId = 'oEs1mwRdYgkNQf1AGmw7JuNYuDXI';
        $templateId = '6qd7c60m3BwzHz9oJuObeYf7o8WEZnVT0jUmrqVBmIg';
        $url = 'https://52xpp.com';
        $data = array(
            "first"  => "恭喜你购买成功！",
            "name"   => "巧克力",
            "price"  => "39.8元",
            "remark" => "欢迎再次购买！",
        );
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        //var_dump($result);

        return $result;
    }
}
