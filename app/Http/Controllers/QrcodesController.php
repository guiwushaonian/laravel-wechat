<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QrcodesController extends Controller
{
    protected $qrcode;

    public function __construct(Application $app)
    {
        $this->qrcode = $app->qrcode;
    }

    //创建临时二维码
    public function tmp_ticket()
    {
        $result = $this->qrcode->temporary(56, 3600);
        $ticket = $result->ticket;

        $url = $this->qrcode->url($ticket);
        $content = file_get_contents($url);


        return view('welcome',compact('content'));
    }
}
