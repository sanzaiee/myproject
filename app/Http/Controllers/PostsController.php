<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use DateTime;
use Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $poster= Post::withTrashed()->get();
        return view('post.index')->with('poster',$poster);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $poster = DB::select('SELECT users.id,users.firstname from users ORDER BY users.id DESC');
        // if($poster == null)
        // $poster = array();

        $poster = User::all();

    
        if(count($poster)<1)
        return redirect()->route('register')->with('error', 'Please Create User.');

        return view('post.create')->with('poster',$poster);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $post = new Post();
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->description =$request->description;
        $poster=User::find($request->post_by)->firstname;
        $po= $request->post_by;
        $post->post_by =$request->post_by;
        $post->save();

        return redirect()->route('post.index')->with('success', ' Post Added Successfull.')->with('po',$po);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id>0){

            $response= Post::find($id);
            if($response != null){
                $post=new Post();
                $post->id =$response->id;
                $post->title =$response->title;
                $post->slug =$response->slug;
                $post->description =$response->description;
                $post->post_by =$response->post_by;
                $post->name = User::find($response->post_by)->firstname;

                return view('post.show')->with('post',$post);
            }

        }

        return view('admin.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $poster = User::all();

    
        if(count($poster)<1)
        return redirect()->route('register')->with('error', 'Please Create User.');

        if($id>0){
                   $response= Post::find($id);
                    if($response!=null){
                        $post = new Post();
                        $post->id =$response->id;
                        $post->title =$response->title;
                        $post->slug =$response->slug;
                        $post->description =$response->description;
                        $post->post_by =$response->post_by;
                        $post->name = User::find($response->post_by)->firstname;

                        return view('post.edit')->with('post',$post)->with('poster',$poster);
                    }
                }
        return view('admin.404');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id>0){
            $response= Post::find($id);
            if($response != null){
                
                $post = Post::find($id);
                
                    
                    $post->title= $request->title;
                    $post->slug= $request->slug;
                    $post->description =$request->description;
                  //  $post->post_by= $request->post_by;

                $post->save();
            return redirect()->route('post.index')->with('success', 'post Updated Successfull.');
            
        }
        return view('admin.404');
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
       // Post::find($id)->foreceDelete();
        return Redirect::back();
    }

    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        return Redirect::back();
    }
}
