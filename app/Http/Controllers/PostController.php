<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Report;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(50);
        return view("posts.index", ['posts' => $posts]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $posts = Post::where('title', 'LIKE', "%{$search}%")->get();
        return view("posts.search", ['posts' => $posts]);
    }

    public function sorted() {
        $sorted_posts = Post::all()->sortByDesc('like_count');
        // return view('posts.sorted', ['sorted_posts' => $sorted_posts]);
        return view('posts.sorted', compact('sorted_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    // public function createIn()
    // {
    //     $this->authorize('createIn', Post::class);

    //     return view('posts.createIn');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd("Hello Post Store Controller");

        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

 
        $path = $request->file('image')->store('public/images');


        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
//        $post->user_id = Auth::user()->id;
        $post->user_id = $request->user()->id;
        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $post->image = $newImageName;

        //save post to db
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);

        return redirect()->route('posts.show', ['post' => $post->id]);
        //                     -------------------------^
        //                    |
        // GET|HEAD  posts/{post} ......... posts.show › PostController@show
    }

    public function gueststore(Request $request)
    {
        $this->authorize('gueststore', Post::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

 
        $path = $request->file('image')->store('public/images');


        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
//        $post->user_id = Auth::user()->id;
        $post->user_id = $request->user()->id;
        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $post->image = $newImageName;
        $post->status = 'incognito';
        //save post to db
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);


        return redirect()->route('posts.show', ['post' => $post->id]);
        //                     -------------------------^
        //                    |
        // GET|HEAD  posts/{post} ......... posts.show › PostController@show
    }
    public function incognito(Request $request)
    {
        $this->authorize('incognito', Post::class);

        $tags = Tag::all();

        return view('posts.incognito', ['tags' => $tags]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)    // Dependency Injection
    {
        if($post->id != null) {
            $post->view_count++;
            $post->save();
        }
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        // $tags = implode(', ', $post->tags->pluck('name')->all());

        $tags = Tag::all();

        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = $request->user()->id;
        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $post->image = $newImageName;
        $post->save();

        $tags = $request->get('tags');
        $tag_ids = $this->syncTags($tags);
        $post->tags()->sync($tag_ids);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    private function syncTags($tags)
    {
        $tags = explode(',', $tags);
        $tags = array_map(function($v) {
            // use Illuminate\Support\Str; ก่อน class
            return Str::ucfirst(trim($v));
        }, $tags);

        $tag_ids = [];
        foreach($tags as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();
            if (!$tag) {
                $tag = new Tag();
                $tag->name = $tag_name;
                $tag->save();
            }
            $tag_ids[] = $tag->id;
        }
        return $tag_ids;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $title = $request->input('title');
        if ($title == $post->title) {
            $post->delete();
            return redirect()->route('posts.index');
        }
        return redirect()->back();
    }

    public function storeComment(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->message = $request->get('message');
        // $comment->name = $post->get('name');
        $comment->name = Auth::user()->name;
        $post->comments()->save($comment);
        return redirect()->route('posts.show', ['post' => $post->id]);
        
    }

    public function storeReport(Request $request,Post $post){
        $report = new Report();
        $report->message = $request->get('message');
        $report->name = Auth::user()->name;
        $report->status = $request->get('status');
        $post->reports()->save($report);
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    
    public function summarize() {
        $tags = Tag::get();
        return view('posts.summarize', ['tags' => $tags]);
    }
    public function piesummarize() {
        $tags = Tag::get();
        return view('posts.piesummarize', ['tags' => $tags]);
    }

    public function uploadImage(Post $post)
    {
        # code...
    }

    
    public function likePost($id)
    {
        $post = Post::find($id);
        $post->like_count++;
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }
}
