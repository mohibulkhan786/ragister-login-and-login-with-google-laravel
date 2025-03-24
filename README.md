<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

In this tutorial, we will implement a complete authentication system in Laravel, including:
- ✅ User Registration with name, email, and password
- ✅ User Login with email and password authentication
- ✅ Google OAuth Login for easy one-click sign-in
- ✅ Session Handling & Middleware for authentication security
- ✅ User Dashboard & Logout Functionality

- You can clone or download the zipfile after that extracted and paste the pest the folder you want.
- Make the .env file through .env.example
- Run the following commands

````
composer update
````
````
php artisan migrate
````
````
php artisan serve
````



**If you want to install then follow some steps which your help to understand the laravel login process**
- Run command and get clean fresh laravel new application.

````
composer create-project --prefer-dist laravel/laravel googleLogin
````
- In first step we will install Socialite Package that provide api to connect with google account. So, first open your terminal and run bellow command:

````
composer require laravel/socialite
````
- In this step we need google client id and secret that way we can get information of other user. so if you don't have google app account then you can create from here : [Google Developers Console](https://console.cloud.google.com/).

- Now you have to click on Credentials and choose first option oAuth and click Create new Client ID button.
- after create account you can copy client id and secret.
- you have to set app id, secret and call back url in config file so open <b>config/services.php</b> and set id and secret this way:

````
return [

    'google' => [

        'client_id' => 'app id',
        'client_secret' => 'add secret',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

] 

````
- In this step first we have to create migration for add google_id in your user table. So let's run bellow command:

````
php artisan make:migration add_google_id_column
````
- database\migrations\2022_07_20_163043_add_google_id_column.php

````
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleIdColumn extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function ($table) {
            $table->string('google_id')->nullable();
            $table->integer('login_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        //
    }
}

````

- Update like this way:
- Models/User.php

 ````
 <?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;   
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'login_type',
        'is_email_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    /**
     * The attributes that should be cast.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    
}

````
- After adding google_id column first we have to add new route for google login. so let's add bellow route in routes/weeb.php file.
- routes/web.php

````
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

````

- After add route, we need to add method of google auth that method will handle google callback url and etc, first put bellow code on your GoogleController.php file.
- app/Http/controllers/GoogleController.php

````
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'login_type' => 2,
                    'password' => encrypt('123456dummy')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
````

- Now at last we need to add blade view so first create new file login.blade.php file and put bellow code:
- Resources/views/auth/login.blade.php

````
@extends('layout')
  
@section('content')
<section class="bbrLoginWrap">
<a class="homeRightIcon" href="/"><i class="icon-home"></i></a>
<div class="container-fluid">
<div class="row align-items-start">
				<div class="col-lg-6 col-12 login-bg-wrap-left">
					<div class="log-bg-img">
						<div class="log-header">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<a href="/" class="logo-center"><img src="images/BB-logo.svg" alt="Logo"></a>
							</div>
							<div class="LoginLeftContent">
								<img src="images/textPath.svg" alt="text" />
								<h3>in rare collectibles</h3>
								<p>Blockbarster is a platform that offers NFTs (digital assets) directly from luxury liquor brands, watches and more… </p>
								<a class="brBtn" href="#">Explore More..</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12 fxt-bg-color">
					<div class="fxt-content">
						<div class="formTitle">
							<h5>Login to Blockbarster</h5>
						</div>
						<div class="fxt-form">
                        <form action="{{ route('login.post') }}" method="POST">
                          @csrf
								<div class="form-group">
									<label for="email" class="input-label">Email Address</label>
									<input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required">
								</div>
								<div class="form-group mb-4">
									<label for="password" class="input-label">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
									<i toggle="#password" class="icon-eye field-icon"></i>
								</div>
								<div class="form-group mb-4">
									<div class="fxt-checkbox-area">
										<div class="custom-checkbox">
											<input id="checkbox1" type="checkbox">
											<label for="checkbox1">Keep me logged in</label>
										</div>
										<a href="forgot-password.html" class="switcher-text">Forgot Password</a>
									</div>
								</div>
								<div class="form-group mb-4">
									<button type="submit" class="fxt-btn-fill mb-0">Login to my account</button>
								</div>

								<div class="text-center mb-4 orDivider">
					              	<p class="fw-bold mb-0">OR</p>
					            </div>

					           	<div class="social-login mb-4">
						            <a class="fxt-btn-br ether mb-3" href="#!" role="button">Sign in With Ethereum Wallet 
                                        <i class="fab icon-eth me-2"></i></a>
						            <a class="fxt-btn-br google" href="{{ url('auth/google') }}" role="button">Sign in With Google 
                                        <i class="fab me-2">
                                            <img src="{{asset('assets/images/google.png')}}" width="56" height="19" alt="google" />
                                        </i>
                                    </a>
                                    <a class="fxt-btn-br google" href="#!" role="button">Sign in With Facebook 
                                        <i class="fa fa-facebook-square fab me-2">
                                            <!-- <img src="{{asset('assets/images/google.png')}}" width="56" height="19" alt="google" /> -->
                                       </i>
                                </a>
                                    <a class="fxt-btn-br facebook" href=""><i class="fab icon-eth me-2"></i>sjc,c</a>
					            
                                </div>
							</form>
						</div>
						<div class="fxt-footer">
							<p>New to blockbarster? <a href="{{ route('register') }}" class="switcher-text2 inline-text">Create Account</a></p>
						</div>
					</div>
				</div>
			</div>
            </div>
            </section>
@endsection
````

**Setup Is Ready to run the last artisan command:**
````
php artisan serve
````

- Now you are ready to use open your browser and check here : URL + '/login'.



