<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Comment;
use Storage;

class PostsController extends Controller
{
     public function _construct()
    {
        $this->missleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = auth()->user()->following()->pluck('users.user_id');
        
         $data = [];
            if (\Auth::check()) {
                $user = \Auth::user();
                $posts = Post::orderBy('created_at', 'desc')->paginate(100);
                //$posts = Post::whereIn('user_id', $users)->latest()->get(); //追加
                
                $data = [
                    'user' => $user,
                    'posts' => $posts,
                ];
            }
        
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;

        return view('posts.create', [
            'post' => $post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
        //$this->validate($request, [ 昔のLaravelのバージョンでの書き方（同じ意味）
            'another'=>'',
            'title' => 'required|max:191',  
            'content' => 'required|max:191',
            'image' => 'required|image',
        ]);
        
        /*                                
        $imagePath = request('image')->store('uploads','public');
                                                        //'s3'
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        */
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        $name = 'post_images/' . $post->id . '.jpg';
        $image = Image::make($request->file('image'))->fit(1200,1200)->encode();
        $path = Storage::disk('s3')->put($name, (string) $image, 'public');
        
        $post->image = Storage::disk('s3')->url($name);
        $post->save();
               
        
        
        return redirect(route('users.show',['id' => \Auth::id()]));
        
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

        return view('posts.show', [
            'post' => $post,
        ]);
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

        return view('posts.edit', [
            'post' => $post,
        ]);
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
        $this->validate($request, [
            'title' => 'required|max:191',   
            'content' => 'required|max:191',
        ]);
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
    
    public function comments($id)
    {
        $post = Post::find($id);
        $comments = $post->comments()->get();
    
        return view('posts.comments',[
            'post' => $post,
            'comments' => $comments,
        ]);

    }
    
}
