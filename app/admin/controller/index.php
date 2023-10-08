<?php

namespace app\admin\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return 'admin '.\think\facade\App::version();
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}
