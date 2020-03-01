<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB; // instead of using model you can import db library and specify your query

class PostsController extends Controller
{ 
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::orderBy('title','desc')->get();
        //$posts= Post::all(); //return all posts
        // return Post::where('title','second title')->get();
       // $posts = DB::select("select * from posts");
       //return Post::orderBy('title','desc')->take(1)->get();
        
       $posts = Post::orderBy('title','desc')->paginate(3); //return pagination on index view
       return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$this->validate($request, [
              'title'=>'required',
              'body'=>'required',
              'cover_image'=>'image|nullable|max:1999'
        ]);

        //handle file upload
        if($request->hasFile('cover_image')) {
            //get file name with the extension
           $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
           //get just file name
           $filename= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           //get just extension
           $extension = $request->file('cover_image')->getClientOriginalExtension();
           //File name to store
           $fileNameToStore=$filename.'_'.time().'.'.$extension;
           $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
 
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $post = new Post();
        $post->title=$data['title'];
        $post->body=$data['body'];
        $post->user_id=auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();       
        return redirect('/posts')->with('success', 'post Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error', 'Unauthorized page access is forbidden');
        }
        return view('posts.edit')->with('post',$post);

        
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
        $post = Post::find($id);
       if($request->hasFile('cover_image')) {
             
             $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
             $filename= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
             $extension = $request->file('cover_image')->getClientOriginalExtension();
             $fileNameToStore=$filename.'_'.time().'.'.$extension;
             $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'post has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error', 'Unauthorized page access is forbidden');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'post Removed');
       
    }
}
