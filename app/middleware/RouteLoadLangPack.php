<?php

declare (strict_types=1);

namespace app\middleware;

use think\Request;
use think\facade\Lang;
use think\facade\Config;

class RouteLoadLangPack
{
    /**
      * 处理请求
      *
      * @param \think\Request $request
      * @param \Closure       $next
      * @return Response
      */
    public function handle(Request $request, \Closure $next)
    {
        $appName = app('http')->getName();
        $controller =  $request->controller();
        $action = $request->action();
        $lang_list = Config::load('lang')['allow_lang_list'];


        // echo '----------------Route----------------------';
        // echo "<br />";
        // echo $appName;
        // echo "<br />";
        // echo $controller;
        // echo "<br />";
        // echo $action;
        // echo "<br />";
        // echo '----------------Route----------------------';

        $para_lang = $request['lang'];
        if(in_array($para_lang,$lang_list)){
			Lang::setLangSet($para_lang);
		}
        $lang = Lang::getLangSet();
        //把当前的语言设置注入request对象
        $request->lang = $lang;

        // echo '----------------Route----------------------';
        // echo "<br />";
        // echo $lang;
        // echo "<br />";
        // echo "<br />";
        // echo $request['lang'];
        // print_r($lang_list);
        // echo "<br />";
        // echo '----------------Route----------------------';

        $APP_PATH = app_path();
        $ROOT_PATH = root_path();

        $c_lang_file = $APP_PATH . 'lang' . DIRECTORY_SEPARATOR . strtolower($controller) . DIRECTORY_SEPARATOR . $lang . '.php';
        $a_lang_file = $APP_PATH . 'lang' . DIRECTORY_SEPARATOR . strtolower($controller) . DIRECTORY_SEPARATOR . strtolower($action) . DIRECTORY_SEPARATOR . $lang . '.php';

        //$c_lang_file = addcslashes($c_lang_file, '\\');
        //$a_lang_file = addcslashes($a_lang_file, '\\');
        //lang::load("E:\\App\\tp613\\app\\admin\\lang\\login\\en-us.php");
        //lang::load("E:\\App\\tp613\\app\\admin\\lang\\login\\read\\en-us.php");
        if (file_exists($c_lang_file)) {
            // 文件存在
            Lang::load($c_lang_file);
        }
        if (file_exists($a_lang_file)) {
            // 文件存在
            Lang::load($a_lang_file);
        }
        return $next($request);
    }
    public function end(\think\Response $response)
    {
    }
}
