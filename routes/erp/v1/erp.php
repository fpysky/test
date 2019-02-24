<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function ($api) {
    //权限相关
    $api->group([
        'namespace' => 'App\Http\Controllers\Erp\V1',
    ],function($api){
        $api->resource('adminers', 'AdminerController', ['only' => ['index', 'store', 'update', 'destroy']]);
        $api->resource('roles', 'RoleController', ['only' => ['index', 'store', 'update', 'destroy']]);
        $api->resource('permissions', 'PermissionController', ['only' => ['index', 'store', 'update', 'destroy']]);
    });

    //登录鉴权
    $api->group([
        'namespace' => 'App\Http\Controllers\Erp\V1',
    ],function($api){
        $api->post('login','AuthController@login');
    });

    $api->group([
        'namespace' => 'App\Http\Controllers\Admin\V1',
        'middleware' => 'auth:admin',
    ],function($api){
        $api->get('user','AuthController@user');
    });

    //测试专用
    $api->group([
        'namespace' => 'App\Http\Controllers\Erp\V1',
    ],function($api){
        $api->get('test',function(){});
    });
});