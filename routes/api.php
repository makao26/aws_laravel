<?php

use Illuminate\Http\Request;

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
/*
protected $routeMiddleware = [
  'jwt_auth'  =>  \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
  'jwt_refresh' => \Tymon\JWTAuth\Http\Middleware\RefreshToken::class,
]

Route::group(["middleware" => "api"], function () {
  // 認証が必要ないメソッド
  Route::post('/register', 'Auth\RegisterController@register'); // 追加
  Route::group(['middleware' => ['jwt.auth']], function () {
    // 認証が必要なメソッド
  });
});
*/

Route::post("/login",function(){
 $email = request()->get("email");
 $password = request()->get("password");
 $user = \App\User::where("email",$email)->first();
 if ($user && Hash::check($password, $user->password)) {
  $token = str_random();
  $user->token = $token;
  $user->save();
  return [
   "token" => $token,
   "user" => $user
  ];
 }else{
  abort(401);
 }
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
