<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$version_available = [
    'current' => true, 
    '1.0' => true, 
    '0.1' => true
    ];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/install', 'InstallController@run');

Route::group(['namespace' => 'html'], function() use ($version_available) {
    //Ver 1.0
    $version = 'current';
    if ($version_available[$version]) 
    {
        Route::group(['namespace' => $version], function() use ($version) {
            Route::group(['as' => 'front_'.$version.'::'], function() use ($version) {
                $isHistory = false;
                $hs = "";
                if ($version !== 'current' && $isHistory) {
                    $hs = "h/{$version}";
                }

                // 试卷入口
                Route::get("/menu/{$hs}", ['as' => 'menu', function() {
                    //return '手动选择单词内容界面';
                    return view("words_kitchen.http.v1.menu");
                }]);

                // 试卷入口
                Route::post("/dish/{$hs}", ['as' => 'dish', function() {
                    return '单词背诵界面';
                }]);

                // 管理控制板
                Route::group(['prefix' => 'kitchen'], function() use ($hs) {
                    // 教师登录入口
                    Route::get("login/{$hs}", ['as' => 'kitchen/login', function(){
                        return '教师登录界面';
                    }]);

                    // 教师注销
                    Route::get("logout/{$hs}", ['as' => 'kitchen/logout', function(){
                        return '教室注销界面';
                    }]);
                });

                // 学生控制板
                Route::group(['prefix' => 'darea'], function() use ($hs) {
                    // 教师登录入口
                    Route::get("login/{$hs}", ['as' => 'darea/login', function(){
                        return '学生登录界面';
                    }]);

                    // 教师注销
                    Route::get("logout/{$hs}", ['as' => 'darea/logout', function(){
                        return '学生注销界面';
                    }]);
                });
            });
        });
    } else {
        Route::any("{target}/h/{$version}", function() {
            return "History Version Forbidden!";
        });
    }

    // 历史版本快速访问
    Route::group(['prefix' => 'history/{ver}'], function() use ($version_available){
        Route::get("{target}", function($ver, $target) use ($version_available){
            if (array_key_exists($ver, $version_available)) {
                if ($version_available[$ver]) {
                    $target = str_replace("_", "/", $target);
                    return redirect()->route("front_{$version}::{$target}");
                } else {
                    return "History Version Forbidden!";
                }
            } else {
                return "Error History Version!";
            }
        });
    });

    // 历史版本存放
    $version = '0.1';
    if ($version_available[$version]) {
        Route::group(['namespace' => $version], function() use ($version){
            Route::group(['as' => 'front_'.$version.'::'], function() use ($version){
                $isHistory = true;
                $hs = "";
                if ($version !== 'current' && $isHistory) {
                    $hs = "h/{$version}";
                }
                // 试卷入口
                Route::get("/menu/{$hs}", ['as' => 'menu', function(){
                    return '手动选择单词内容界面(HV::0.1)';
                }]);
                // 试卷入口
                Route::post("/dish/{$hs}", ['as' => 'dish', function(){
                    return '单词背诵界面(HV::0.1)';
                }]);

                // 管理控制板
                Route::group(['prefix' => 'kitchen'], function() use ($hs) {
                    // 教师登录入口
                    Route::get("login/{$hs}", ['as' => 'kitchen/login', function(){
                        return '教师登录界面(HV::0.1)';
                    }]);

                    // 教师注销
                    Route::get("logout/{$hs}", ['as' => 'kitchen/logout', function(){
                        return '教室注销界面(HV::0.1)';
                    }]);
                });

                // 学生控制板
                Route::group(['prefix' => 'dining_area'], function() use ($hs) {
                    // 教师登录入口
                    Route::get("login/{$hs}", ['as' => 'da/login', function(){
                        return '学生登录界面(HV::0.1)';
                    }]);

                    // 教师注销
                    Route::get("logout/{$hs}", ['as' => 'da/logout', function(){
                        return '学生注销界面(HV::0.1)';
                    }]);
                });
            });
        });
    } else {
        Route::any("{target}/h/{$version}", function() {
            return "History Version Forbidden!";
        });
    }
});


Route::group(['namespace' => 'restful'], function(){
    
    Route::group(['namespace' => '1.0'], function() {
        //
    });
    
});



/*
Route::get('/menu', function(){
        return 'Version::';
    });



// HTML
Route::group(['namespace' => 'html'], function(){
    Route::group(['as' => 'menu::'], function(){
        
    });
});

// RESTful
Route::group(['namespaceas' => 'restful'], function(){
    Route::group([], function(){

    });
});


Route::get('/', function () {
    return view('welcome');
});

// 正式业务逻辑

// 试卷入口
Route::post('/dish', function(){

});


// 管理界面

Route::get('/kitchen', function(){

});

// 学生界面
Route::get('/dining_area', function(){

});

*/

/*
 *  RESTful API
 *  (menu)
 */


/*
 *  RESTful API
 *  (kitchen)
 */





/*
 *  RESTful API
 *  (dining_area)
 */


