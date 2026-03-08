<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_Relation;
use App\Models\Srz_Cpt;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CustomFields;
use App\Models\CustomOptions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
     
    
    public $type = 'movies';

    public function index()
    { 
        $type= "blog";
        $name= 'Categories';


        $page =  request()->get('page',1);
        $page= max(1,$page);
        $limit= env('PAGINATION_LIMIT',10);
        $offset= ($page-1)*$limit;
        $total_cats= Category::where([
            'type' =>$type,
            // 'status' => 1
            ])->count();

        
        $total_pages= ceil($total_cats/$limit);
        

        $categories= Category::where([
            'type' =>$type,
            // 'status' => 1
            ])->orderBy('id','desc')->paginate(
                $limit,
                ['*'],
                'page',
                $page
            );

        return view('admin.pages.categories.index', compact('categories','type','name','total_cats','total_pages'));
    
    }
    // add 
    public function add()
    {
        $type= "blog";
        $name= 'Category'; 
        
        $categories = Category::where('type', $type)
        ->orderBy('name', 'asc')
        ->get();
 
        return view('admin.pages.categories.add-category', compact('categories','type','name'));

        
       
    }

    //store 
    public function store(Request $request)
    {  
        
        $type = 'category';

        //validate request
        $request->validate([
            'name' => 'required',
            'content' => 'required', 
        ]);
         

        // add category
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('content');
        $category->slug = Str::slug($request->input('name'));
        $category->type = $type;

        // if parent category
        if($request->input('category')){
            $category->parent = $request->input('category', 0);
        }

        $category->save();

        if($request->hasFile('uploadImg')){
            $image = $request->file('uploadImg');
            $name = time().'.'.$image->getClientOriginalExtension();
         
            $public_img_url = asset('uploads/'.$name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name); 
            $category->save();
        // set thumbnail url to custom field
        update_field('cat_img', $public_img_url, $type, $category->id);

        }else{
            // set thumbnail url to custom field
            if($request->get('img', '')){
                update_field('cat_img', $request->get('img', ''), $type, $category->id);
            }
        }

        //redirect with success message
        return redirect()->route('admin.categories.edit', [
            'id' => $category->id
        ])->with('success', 'Category added successfully');

    }
    // edit 
    public function edit(Request $request, $id)
    {

        $name = 'Category';
        $type = 'blog';

 
        $categories = Category::where('type', $type)
        ->whereNotIn('id', [$id])
        ->orderBy('name', 'asc')
        ->get();
    
        $category = Category::find($id);
        
        $selected_categories = Category_Relation::where('post_id', $id)
       
        ->pluck('category_id')->toArray();

        return view('admin.pages.categories.edit-category', compact('category', 'categories', 'selected_categories','type','name'));

    }
    // update
    public function update(Request $request, $id)
    { 
        $type = 'category';
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('content'); 
        $category->type = $type;
        $category->slug = Str::slug($request->input('name'));
        // if parent category
        if($request->input('category')){
            $category->parent = $request->input('category', 0);
        }
        
        $category->save();


        if($request->hasFile('uploadImg')){
            $image = $request->file('uploadImg');
            $name = time().'.'.$image->getClientOriginalExtension();
            $public_img_url = asset('uploads/'.$name);
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name); 
            $category->save();
            // set thumbnail url to custom field
        update_field('cat_img', $public_img_url, $type, $category->id);
        }else{
            // set thumbnail url to custom field
            if($request->get('img', '')){
                update_field('cat_img', $request->get('img', ''), $type, $category->id);
            }
        }

 
        return redirect()->back()->with('success', 'Category updated successfully');
    }
    // delete with message
    public function delete($id)
    {
        $post = Category::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');

        
    }


    // // search
    // public function search(Request $request)
    // {
    //     $search = $request->input('search');
    //     $posts = Srz_Cpt::where('post_title', 'like', '%'.$search.'%')->get();
    //     return view('search', compact('posts'));
    // }

    // // single view
    // public function single(Srz_Cpt $movie)
    // { 

    //     // views  field
    //     $views = get_field('views','movies', $movie->id);
    //     if($views){
    //         update_field('views', intval($views)+1, 'movies', $movie->id);
    //     }else{
    //         update_field('views', 1, 'movies', $movie->id);
    //     }

    //     return view('pages.single-movie', compact('movie'));
    // }
   




}
