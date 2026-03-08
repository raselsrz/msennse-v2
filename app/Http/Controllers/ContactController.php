<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\CustomFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    //

    public function index()
    {

        $type= "contact";
        $name= 'Contact';

        $page =  request()->get('page',1);
        $page= max(1,$page);
        $limit= env('PAGINATION_LIMIT',10);
        $offset= ($page-1)*$limit;
        $total_movies= Post::where([
            'post_type' =>$type,
            // 'status' => 1
            ])->count();
        $total_pages= ceil($total_movies/$limit);
        $movies= Post::where([
            'post_type' =>$type,
            // 'status' => 1
            ])->orderBy('id','desc')->paginate(
                $limit,
                ['*'],
                'page',
                $page
            );
        
        return view('admin.pages.message.index', compact('movies','type','name','total_movies','total_pages'));
    }

    //show
    public function show($id)
    {
        $type= "contact";
        $name= 'Contact';
        $movie= Post::where([
            'id' => $id,
            'post_type' => $type
        ])->first();
        if(!$movie){
            return redirect()->route('contact')->with('error', 'Contact not found.');
        }
        return view('admin.pages.message.view', compact('movie','type','name'));
    }

    //add form
    public function contact()
    {
        return view('pages.contact');
    }

    //store
    public function contactStore(Request $request)
    {


            $request->validate([
        // তোমার অন্যান্য validation
        'g-recaptcha-response' => 'required',
    ]);

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => env('RECAPTCHA_SECRET_KEY'),
        'response' => $request->input('g-recaptcha-response'),
        'remoteip' => $request->ip(),
    ]);

    $body = $response->json();

    if (!$body['success']) {
        return back()->with('error', 'Robot verification failed, please try again.');
    }

        $type = 'contact';

        //validate
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        //add movie
        $movie = new Post();
        $movie->post_title = $request->input('name');
        $movie->post_content = $request->input('message');
        $movie->post_type = 'contact';
        $movie->post_author = Auth::id();
        $movie->post_status = 'publish';
        $movie->save();

        //add email
        $email = $request->input('email');
        if($email){
            update_field('email', $email, $type, $movie->id);
        }

        // //add address
        $phone = $request->input('phone');
        if($phone){
            update_field('phone', $phone, $type, $movie->id);
        }

        return redirect()->route('contact')->with('success', 'Contact Submit successfully.');
    }


    //support
    public function support()
    {
        return view('dashboard.support');
    }


}
