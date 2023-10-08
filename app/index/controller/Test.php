<?php

namespace app\index\controller;

use app\BaseController;
use think\facade\View;

class Test extends BaseController
{
    public function index()
    {
        //return  'index '.\think\facade\App::version();
        return View::fetch();
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}
