<?php
require __DIR__.'/vendor/autoload.php';
use Itxiao6\Session\Session;
use Itxiao6\Http\Http;
# 获取SWOOLE 实例
$http_server = Http::get_swoole('127.0.0.1',9502);
# 设置静态文档根目录
$http_server -> set_param('document_root',__DIR__.'/html/');
// 设置存储介质
//Session::set_driver('Local'); // 默认为 Local
// 启动会话
//Session::session_start(__DIR__.'/session');
# 启动HTTP SERVER
$http_server -> start(function($request,$response){
    # 打印数据
    $response -> dump(function() use($request,$response){
        echo "<pre>";
        /**
         * session 篇
         */
        # 设置request
//        Session::set_request($request -> get_request());
        # 设置response
//        Session::set_response($response -> get_response());
        # 设置session
//        Session::set('name','戒尺');
        # 保存session
//        Session::save();
        # 获取session 全部内容
//        var_dump(Session::get());
        # 获取session 指定内容
//        var_dump(Session::get('name'));

        /**
         * 路由篇
         */
//        if($request -> get_uri() == '/Home/Index/index.html'){
//            echo "欢迎来到首页";
//        }else if($request -> get_uri() == '/Home/User/index.html'){
//            echo "欢迎来到用户中心";
//        }

        /**
         * 文件上传篇
         */
        if($request -> get_uri() == '/upload'){
            var_dump($request -> get_files());
        }

        /**
         * cookie 篇
         */
        # 设置COOKIE
//        var_dump($response -> set_cookie('name','itxiao6',time()+3600,'/'));
        # 获取全部COOKIE
//        var_dump($request -> get_cookie());
        # 获取置顶COOKIE
//        var_dump($request -> get_cookie('name'));
        echo "</pre>";
    });

//    # 分段响应数据1
//    $response -> write('测试内容1<br>');
//    # 分段响应数据2
//    $response -> write('测试内容2<br>');
    # 响应结束
    $response -> end();
});