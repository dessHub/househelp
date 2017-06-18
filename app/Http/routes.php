<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Category;
use Validator;
use Auth;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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

$this->get('/', function () {
    return view('welcome');
});

$this->get('/signE', function () {   //Registration route for employer
    return view('auth/signup');
});

$this->get('/signup', function () {   //Registration route for househelps

  $cat = Category::get();

  return view('auth/Signup')->with('cats', $cat);
});

$this->get('foremployer', function()
    {
        $name = User::where("role","=","Househelp")->get();
        return view('employer')->with('users', $name);
    });

$this->get('forhousehelp', function()
        {
            $name = Post::where("status","=","open")->get();
            return view('househelp')->with('posts', $name);
        });

$this->auth();

$this->get('/home', 'HomeController@index');


$this->get('cat', 'IndexController@cat');
$this->post('cat', 'IndexController@addCat');
$this->get('post', 'IndexController@post');
$this->post('post', 'IndexController@addPost');
$this->get('deletepost{id}', 'IndexController@deletepost');
$this->get('mystars', 'IndexController@mystars');

$this->get('admin', 'IndexController@admin');
$this->get('hHelps', 'IndexController@househelps');
$this->get('posts', 'IndexController@posts');
$this->post('validity', 'IndexController@validity');
$this->get('myjobs', 'IndexController@myjobs');
$this->post('star', 'IndexController@star');
