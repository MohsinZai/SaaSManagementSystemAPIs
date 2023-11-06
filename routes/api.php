<?php

// use App\Http\Controllers\OverviewController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MonthlyDetailsController;
use App\Http\Controllers\RealTimeOverViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Contracts\Container\BindingResolutionException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [PostController::class, 'index']);

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){
    $api->get('/', function(){
        return "Hello Stores API";
    });


    //Product
    // Route::get('/product', ProductController::class, 'index');
    // Route::post('/product/store', ProductController::class, 'store');
    $api->get('/product/index', 'App\Http\Controllers\ProductController@index');
    $api->post('/product/store', 'App\Http\Controllers\ProductController@store');

    $api->get('/realtime/index', 'App\Http\Controllers\RealTimeOverViewController@index');
    $api->post('/realtime/store', 'App\Http\Controllers\RealTimeOverViewController@store');

    $api->get('/comprehensive_reports/index', 'App\Http\Controllers\ComprehensiveReportController@index');
    $api->post('/comprehensive_reports/store', 'App\Http\Controllers\ComprehensiveReportController@store');

    $api->get('/monthly_details/index', 'App\Http\Controllers\MonthlyDetailsController@index');
    $api->post('/monthly_details/store', 'App\Http\Controllers\MonthlyDetailsController@store');

    $api->get('/user_profile/show', 'App\Http\Controllers\UserProfileController@index');
    $api->post('/user_profile/insert', 'App\Http\Controllers\UserProfileController@store');
    $api->put('/user_profile/update', 'App\Http\Controllers\UserProfileController@update');


    $api->post('/signup', 'App\Http\Controllers\UserController@store');
    $api->post('/login', 'App\Http\Controllers\Auth\AuthController@login');
    $api->group(['middleware' => 'api', 'prefix' => 'auth'], function($api){
        $api->post('/token/refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
        $api->post('/logout', 'App\Http\Controllers\Auth\AuthController@logout');
    });
// });

    $api->group(['middleware' => ['role:super-admin'], 'prefix' => 'admin'], 
    function($api) {
        $api->get('/users', 'App\Http\Controllers\Admin\AdminUserController@index');
    });

    // $api->post('/overview', 'App\Http\Controllers\OverviewController@index');

});

// Route::get('overviews', [OverviewController::class, 'index']);
