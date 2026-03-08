<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CustomFields;
use Illuminate\Http\Request;
use App\Models\CustomOptions;
use App\Models\Category_Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Relations\Relation;

class NewsController extends Controller
{
    public $type = 'blog';

    public function index()
    { 
        $type= "blog";
        $name= 'Blog';


        $page =  request()->get('page',1);
        $page= max(1,$page);
        $limit= env('PAGINATION_LIMIT',10);
        $offset= ($page-1)*$limit;
        $total_news= Post::where([
            'post_type' =>$type,
            // 'status' => 1
            ])->count();
        $total_pages= ceil($total_news/$limit);
        $news= Post::where([
            'post_type' =>$type,
            // 'status' => 1
            ])->orderBy('id','desc')->paginate(
                $limit,
                ['*'],
                'page',
                $page
            );
        
        return view('admin.pages.news.index', compact('news','type','name','total_news','total_pages'));
   


    }
    // add 
    public function add()
    {
        $type= "blog";
        $name= 'Blog';
        $categories = Category::where('type', 'category')
        ->orderBy('name', 'asc')
        ->get();
        return view('admin.pages.news.add', compact('categories','type','name'));
    
    }

    //store 
    public function store(Request $request)
    {  
        
        $type = 'blog';

        //validate request
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'categories' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        //add movie
        $movie = new Post();
        $movie->post_title = $request->input('post_title');
        $movie->post_content = $request->input('post_content');
        $movie->post_type = 'blog';
        $movie->post_author = Auth::id();
        $movie->post_status = 'publish';
        $movie->save();
        //add categories
        $categories = $request->input('categories');
        
        
        if($categories){ 
            foreach($categories as $category){
                 $movie->categories()->attach($category);
            }
        }
        // image upload
        if($request->hasFile('uploadImg')){
            $image = $request->file('uploadImg');
            $name = time().'.'.$image->getClientOriginalExtension();
         
            $public_img_url = asset('uploads/'.$name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name); 
            $movie->save();
        // set thumbnail url to custom field
        update_field('thumbnail', $public_img_url, $type, $movie->id);


            //set thumbNail
        }else{
            // set thumbnail url to custom field
            if($request->get('img', '')){
                update_field('thumbnail', $request->get('img', ''), $type, $movie->id);
            }
             
        }

        //redirect with success message
        return redirect()->route('admin.news.edit', [
            'id' => $movie->id
        
        ])->with('success', 'Blog added successfully');

    }

    // edit
    public function edit(Request $request, $id)
    {
        $type= "blog";
        $name= 'Blog';
        $categories = Category::where('type', 'category')
        ->orderBy('name', 'asc')
        ->get();
 
        $selected_categories = Category_Relation::where('post_id', $id)->pluck('category_id')->toArray();
        $news = Post::find($id);
        return view('admin.pages.news.edit', compact('news','selected_categories','type','name','categories'));
    }

    // update
    public function update(Request $request, $id)
    { 
        $type = 'blog';
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'categories' => 'required',
        ]);

        $news = Post::find($id);
        $news->post_title = $request->input('post_title');
        $news->post_content = $request->input('post_content');
        $news->save();
        //add categories
        $categories = $request->input('categories');
        $news->categories()->detach();
        if($categories){ 
            foreach($categories as $category){
                 $news->categories()->attach($category);
            }
        }
        // image upload
        if($request->hasFile('uploadImg')){
            $image = $request->file('uploadImg');
            $name = time().'.'.$image->getClientOriginalExtension();
         
            $public_img_url = asset('uploads/'.$name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name); 
            $news->save();
        // set thumbnail url to custom field
        update_field('thumbnail', $public_img_url, $type, $news->id);
        }else{
            // set thumbnail url to custom field
            if($request->get('img', '')){
                update_field('thumbnail', $request->get('img', ''), $type, $news->id);
            }
        }

        //Featured
        if($request->get('featured', '')){
            update_field('featured', $request->get('featured', ''), $type, $news->id);
        }

        //redirect with success message
        return redirect()->route('admin.news.edit', [
            'id' => $news->id
        ])->with('success', 'Blog updated successfully');
    }

    // delete
    public function delete(Request $request, $id)
    {
        $news = Post::find($id);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Blog deleted successfully');
    }


    //blog
    public function blog()
    {
        $type = "blog";
        $name = 'Blog';
        $limit = env('PAGINATION_LIMIT', 1); // Number of items per page
    
        // Fetch paginated posts
        $news = Post::where([
            'post_type' => $type,
            'post_status' => 'publish'
        ])->orderBy('id', 'desc')->paginate($limit);
    
        return view('pages.blog', compact('news', 'type', 'name'));
    }

    //blogCategory
    public function blogCategory($slug)
    {
        $type = "blog";
        $name = 'Blog';
        $category = Category::where('slug', $slug)->first();
        $limit = env('PAGINATION_LIMIT', 1); // Number of items per page
    
        // Fetch paginated posts
        $news = Post::where([
            'post_type' => $type,
            'post_status' => 'publish'
        ])->whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->orderBy('id', 'desc')->paginate($limit);

        return view('pages.category', compact('news', 'type', 'name', 'category'));
    }
    


    
    //commentStore
    public function commentStore(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    //comment admin
    public function commentAdmin()
    {
        $type= "comment";
        $name= 'Comment';
        $page =  request()->get('page',1);
        $page= max(1,$page);
        $limit= env('PAGINATION_LIMIT',10);
        $offset= ($page-1)*$limit;
        $total_comments= Comment::count();
        $total_pages= ceil($total_comments/$limit);
        $comments= Comment::orderBy('id','desc')->paginate(
            $limit,
            ['*'],
            'page',
            $page
        );
        return view('admin.pages.comments.index', compact('comments','type','name','total_comments','total_pages'));
    }

    //commentsApprove
    public function commentsApprove(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->status = $request->input('status');
        $comment->save();
        return redirect()->route('admin.comments.index')->with('success', 'Comment approved successfully');
    }

    //commentsView
    public function commentsView(Request $request, $id)
    {
        $type= "comment";
        $name= 'Comment';
        $comment = Comment::find($id);
        return view('admin.pages.comments.view', compact('comment','type','name'));
    }

    //commentsDelete
    public function commentsDelete(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully');
    }


    //blog detail
    public function blogDetail($slug)
    {
        $type= "blog";
        $name= 'Blog';

        $blog = Post::where([
            'post_type' =>$type,
            'post_status' => 'publish',
            'post_slug' => $slug
            ])->first();


            if ($blog->post_type === 'blog') {
                // Get current views count
                $views = get_field('views', 'blog', $blog->id);
                // Increment views count
                if ($views) {
                    update_field('views', intval($views) + 1, 'blog', $blog->id);
                } else {
                    update_field('views', 1, 'blog', $blog->id);
                }
            }

        // Get comments
        $comments = Comment::where('post_id', $blog->id)->
        orderBy('id', 'desc')->
        where('status', 1)->
        get();


        return view('pages.single-blog', compact('blog','type','name','comments'));
    }












}
