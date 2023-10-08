<?php

namespace app\index\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Cookie;

class Index extends BaseController
{
    public function index()
    {
        //return  'index '.\think\facade\App::version();

        Cookie::set('name', 'value', 3600);
        return View::fetch();
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}
