<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    //永久素材
    public $material;

    // 临时素材
    public $temporary;


    public function __construct(Application $app)
    {
        $this->material = $app->material;
        $this->temporary = $app->material_temporary;
    }

    //永久素材 上传图片
    public function uploadImage()
    {
        $result = $this->material->uploadImage("./个人头像.jpg");

        return $result;
    }

    //获取永久素材列表
    public function lists()
    {
        $lists = $this->material->lists('image', 0, 10);

        return $lists;
    }
}
