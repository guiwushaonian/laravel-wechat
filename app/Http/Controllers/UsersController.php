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
}
