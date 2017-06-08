<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Department;
use App\Course;
use App\Category;
use App\Unit;
use Validator;
use Auth;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        $name = Category::get();
        $id = Auth::user()->id;
        $post = Post::where('empl_id','=',$id)->get();
        return view('post')->with('posts', $post)->with('cats', $name);
    }

    protected function addPost() {
      $rules = array(
              'empl_name' => 'required|max:100',
              'empl_id' => 'required|max:100',
              'cat' => 'required|max:100',
              'salary' => 'required|max:100',
              'description' => 'required|max:255',
              'location' => 'required|max:100',
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/post')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
        $post = new Post;
        $post->empl_name     = Input::get('empl_name');
        $post->empl_id     = Input::get('empl_id');
        $post->salary     = Input::get('salary');
        $post->description     = Input::get('description');
        $post->location     = Input::get('location');
        $post->category     = Input::get('cat');

        // save report
        $post->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('/post');
         }

    }

    public function cat()
    {
        $name = Category::get();
        return view('categories')->with('cats', $name);
    }

    protected function addCat() {
      $rules = array(
              'name' => 'required|max:100'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/cat')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
        $cat = new Category;
        $cat->name     = Input::get('name');;

        // save report
        $cat->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('/cat');
         }

    }




}
