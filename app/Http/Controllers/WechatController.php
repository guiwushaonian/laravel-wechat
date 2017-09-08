<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Message\Image;
use Log;

class WechatController extends Controller
{
  /**
    * 处理微信的请求消息
    *
    * @return string
    */
    public function serve()
    {
      Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

      $wechat = app('wechat');
      //测试号
      $userApi = $wechat->user;

      $wechat->server->setMessageHandler(function($message) use ($userApi){
          //return "欢迎关注 overtrue！";
          switch ($message->MsgType) {
              case 'event':
                  if($message->Event == 'click'){
                        if($message->EventKey == 'TODAY_IMAGE'){
                            return new Image(['media_id' => '4mSfw9-EXzn-EcLAr5aEVcRXZJC5mpljNKJzw0zk_iI']);
                        } elseif($message->EventKey == 'VOTE_GOOD') {
                            return '感谢您的点赞';
                        } else {
                            return '暂无此事件key值';
                        }
                  }
                  return '收到事件消息';
                  break;
              case 'text':
                  return '收到文字消息,您好：'.$userApi->get($message->FromUserName)->nickname;
                  break;
              case 'image':
                  return new Image(['media_id' => '4mSfw9-EXzn-EcLAr5aEVcRXZJC5mpljNKJzw0zk_iI']);
                  //return '收到图片消息';
                  break;
              case 'voice':
                  return '收到语音消息';
                  break;
              case 'video':
                  return '收到视频消息';
                  break;
              case 'location':
                  return '收到坐标消息';
                  break;
              case 'link':
                  return '收到链接消息';
                  break;
              // ... 其它消息
              default:
                  return '收到其它消息';
                  break;
          }
      });

      Log::info('return response.');

      return $wechat->server->serve();
    }
}
