<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Category;
use App\Star;
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

  public function posts()
    {
        $post = Post::get();
        return view('posts')->with('posts',$post);
    }

  public function myjobs()
    {
        $post = Post::where('category','=',Auth::user()->category)->get();
        return view('posts')->with('posts',$post);
    }

  public function mystars()
    {
        $name = Star::where("user_id","=",Auth::user()->id)->get();
        return view('mystars')->with('posts', $name);
    }

  public function applicants()
    {
        $name = Star::where("empl_id","=",Auth::user()->id)->get();
        return view('aplications')->with('posts', $name);
    }

    protected function validity(){
      $rules = array(
              'post_id' => 'required|max:100'
          );

          $validator = Validator::make(Input::all(), $rules);


    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/posts')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
      if(Input::get('valid') === 'Unverified'){
         $post_obj = new Post();
         $post_obj->id = Request::input('post_id');
         $post = Post::find($post_obj->id); // Eloquent Model
         $post->update(['validity'=>'Verified']);
         return redirect('/posts');

       }elseif(Input::get('valid') === 'Verified'){
         $post_obj = new Post();
         $post_obj->id = Request::input('post_id');
         $post = Post::find($post_obj->id); // Eloquent Model
         $post->update(['status'=>'Closed']);
         return redirect('/posts');


       }
     }

    }

  public function loadBid($id)
    {
        $name = Star::where("user_id","=",Auth::user()->id)->where("post_id","=",$id)->count();
        $post = Post::findOrFail($id);
        if($name > 0){
          return view('404');
        }else{
          return view('bidding')->with('post', $post);
        }

    }

    protected function star(){
      $rules = array(
              'post_id' => 'required|max:100',
              'description' => 'required|max:200',
          );

          $validator = Validator::make(Input::all(), $rules);


    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();
        $id = Input::get('post_id');

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/bid'.$id)
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
      $count = Star::where('user_id','=',Auth::user()->id)->where('post_id','=', Input::get('post_id'))->count();
      if($count > 0){

         return redirect('/mystars');

       }else{
         $star = new Star;
        $star->user_id     = Auth::user()->id;
        $star->post_id     = Input::get('post_id');
        $star->empl_id     = Input::get('h_id');
        $star->category     = Input::get('cat');
        $star->user_name = Auth::user()->name;
        $star->phoneno = Auth::user()->phoneno;
        $star->star    = Input::get('description');
        $star->save();
         return redirect('/mystars');


       }
     }

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

  protected function deletepost($id) {

    $hit = Post::find($id);
    $hit->delete();
    return Redirect::to('/post');
  }

protected function deleteUser($id) {

  $hit = User::find($id);
  $hit->delete();
  return Redirect::to('/hHelps');
}

    public function admin()
    {
        $name = User::where('role','=','Employer')->get();
        return view('admin')->with('users', $name);
    }

    public function househelps()
    {
        $name = User::where('role','=','Househelp')->get();
        return view('admin')->with('users', $name);
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
