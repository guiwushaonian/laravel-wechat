<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $wechat = app('wechat');
    $url = $wechat->url;
    $shortUrl = $url->shorten('http://overtrue.me/open-source');
    $shortUrl = $shortUrl->short_url;
    $url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQEO8DwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyNVR2Wk13aWRkQzExQi0yT3hwMVQAAgRuNLJZAwQQDgAA';
    return view('welcome',compact('shortUrl','url'));
});

Route::group(['middleware'=>['web']],function() {
    Route::get('/users','UsersController@users');
    Route::get('/user/{openId}','UsersController@user');
    Route::get('/remark','UsersController@remark');

    Route::get('/send_all','MessagesController@sendAll');
    Route::get('/send_two','MessagesController@sendTwo');

    Route::get('/notice','NoticesController@notice');

    //素材管理
    Route::get('/image','MaterialsController@uploadImage');
    Route::get('/lists','MaterialsController@lists');
    Route::get('/get_material','MaterialsController@getMaterial');

    //获取菜单
    Route::get('/menus','MenusController@getMenus');
    Route::get('/create_menu','MenusController@create');

    //创建临时二维码
    Route::get('/qrcode','QrcodesController@tmp_ticket');
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        //return $user;
        return view('user',compact('user'));
        //dd($user);
    });
});

Route::any('/wechat', 'WechatController@serve');
