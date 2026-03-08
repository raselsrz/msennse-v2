<?php

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Plans;
use App\Models\Category;
use App\Models\Language;
use App\Models\CustomFields;
use Illuminate\Http\Request;
use App\Models\CustomOptions;
use App\Models\Transaction;
use App\Helpers\TransactionHelper;
use App\Models\Category_Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// routes/web.php
Route::get('/login', [AuthController::class, 'login'])->name('login');

//post login
Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');

//register routes
Route::get('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('register', [App\Http\Controllers\AuthController::class, 'signupStore'])->name('signupStore');

//post register
// Route::post('register', [App\Http\Controllers\AuthController::class,'postRegister'])->name('register');

//sing up
// Route::get('signup', [App\Http\Controllers\AuthController::class,'register'])->name('signup');
//post signup

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/verify-email', [VerificationController::class, 'showVerificationForm'])->name('verify-email');
Route::post('/verify-email', [VerificationController::class, 'verify'])->name('verify-email');



Route::get('check', function () {
    //if exists get the id or insert 
    $is_admin = User::find(1)->hasRole('admin');
    User::find(1)->assignRole('admin');

    return Auth::check();
})->middleware('role:admin');

// route group for admin, names also
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {


    Route::get('dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');


    //categories manage group route , view like admin.pages.categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {

        Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('categoriesHome');
        Route::get('add', [App\Http\Controllers\CategoryController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\CategoryController::class, 'store'])->name('addProccess');

        Route::get('edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');

        //delete category
        Route::get('delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
    });

    //plans manage group route , view like admin.pages.plans
    Route::group(['prefix' => 'plans', 'as' => 'plans.'], function () {

        Route::get('/', [App\Http\Controllers\PlansController::class, 'index'])->name('index');
        Route::get('add', [App\Http\Controllers\PlansController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\PlansController::class, 'store'])->name('store');

        Route::get('edit/{id}', [App\Http\Controllers\PlansController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\PlansController::class, 'update'])->name('update');

        //approve plan
        Route::post('/{id}', [App\Http\Controllers\PlansController::class, 'approve'])->name('approve');

        //delete plan
        Route::get('delete/{id}', [App\Http\Controllers\PlansController::class, 'delete'])->name('delete');
    });


    //languages manage group route , view like admin.pages.languages
    Route::group(['prefix' => 'languages', 'as' => 'languages.'], function () {

        Route::get('/', [App\Http\Controllers\LanguagesController::class, 'index'])->name('index');
        Route::get('add', [App\Http\Controllers\LanguagesController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\LanguagesController::class, 'store'])->name('store');

        Route::get('edit/{id}', [App\Http\Controllers\LanguagesController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\LanguagesController::class, 'update'])->name('update');

        //delete language
        Route::get('delete/{id}', [App\Http\Controllers\LanguagesController::class, 'delete'])->name('delete');

        //set default language
        Route::get('default/{id}', [App\Http\Controllers\LanguagesController::class, 'default'])->name('default');

        //translate language
        Route::get('translate/{id}', [App\Http\Controllers\LanguagesController::class, 'translate'])->name('translate');
        Route::post('translate/{id}', [App\Http\Controllers\LanguagesController::class, 'updateTranslation'])->name('translateStore');


    });



    //task manage group route , view like admin.pages.tasks
    Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {

        Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');
        Route::get('add', [App\Http\Controllers\TaskController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\TaskController::class, 'store'])->name('store');

        Route::get('edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');

        //delete task
        Route::get('delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');
    });

    //diposit manage group route , view like admin.pages.diposits
    Route::group(['prefix' => 'diposits', 'as' => 'diposits.'], function () {

        Route::get('/', [App\Http\Controllers\PaymentController::class, 'dipositsIndex'])->name('index');

        //approve diposit
        Route::post('/{id}', [App\Http\Controllers\PaymentController::class, 'dipositsApprove'])->name('approve');

        //delete diposit
        Route::get('delete/{id}', [App\Http\Controllers\PaymentController::class, 'dipositsDelete'])->name('delete');
    });

    //withdrawals manage group route , view like admin.pages.withdrawals
    Route::group(['prefix' => 'withdrawals', 'as' => 'withdrawals.'], function () {

        Route::get('/', [App\Http\Controllers\PaymentController::class, 'withdrawalsIndex'])->name('index');

        //approve withdrawal
        Route::post('/{id}', [App\Http\Controllers\PaymentController::class, 'withdrawalsApprove'])->name('approve');


        //delete withdrawal
        Route::get('delete/{id}', [App\Http\Controllers\PaymentController::class, 'withdrawalsDelete'])->name('delete');
    });



    //users manage group route , view like admin.pages.users
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('add', [App\Http\Controllers\UserController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\UserController::class, 'store'])->name('store');

        Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');

        //delete user
        Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
    });

    //mail manage group route , view like admin.pages.mail
    Route::group(['prefix' => 'mail', 'as' => 'mail.'], function () {

        Route::get('/add', [MailController::class, 'add'])->name('add');
        Route::post('/add', [MailController::class, 'sendEmail'])->name('store');

    });

    //news manage group route , view like admin.pages.news
    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {

        Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('index');
        Route::get('add', [App\Http\Controllers\NewsController::class, 'add'])->name('add');
        //post add with img upload
        Route::post('add', [App\Http\Controllers\NewsController::class, 'store'])->name('store');

        Route::get('edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('edit');
        //post update
        Route::post('update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('update');

        //delete news
        Route::get('delete/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('delete');
    });

    //message manage group route , view like admin.pages.message
    Route::group(['prefix' => 'message', 'as' => 'message.'], function () {

        Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('messageHome');


        Route::get('view/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('view');

        //update
        Route::post('view/{id}', [App\Http\Controllers\ContactController::class, 'shows'])->name('update');

        //delete news
        Route::get('delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('delete');

    });

    //comments manage group route , view like admin.pages.comments
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {

        Route::get('/', [App\Http\Controllers\NewsController::class, 'commentAdmin'])->name('index');

        //approve comment
        Route::post('/{id}', [App\Http\Controllers\NewsController::class, 'commentsApprove'])->name('approve');

        //view comment
        Route::get('view/{id}', [App\Http\Controllers\NewsController::class, 'commentsView'])->name('view');

        //delete news
        Route::get('delete/{id}', [App\Http\Controllers\NewsController::class, 'commentsDelete'])->name('delete');
    });



    //settings page
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings');

    //store settings 
    Route::post(
        'settings',
        [App\Http\Controllers\AdminController::class, 'settingsStore']
    )->name('settingsProccess');


    //profile 
    Route::get('profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    //store profile
    Route::post('profile', [App\Http\Controllers\AdminController::class, 'profileStore'])->name('profileProccess');




Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return '✅ All Laravel caches (cache, config, route, view) have been cleared!';
})->name('cache');



});






Route::get('/', function () {
    return View::make('pages.home');

})->name('home');

//about
Route::get('about', function () {
    return View::make('pages.about');

})->name('about');

//contact
Route::get('contact', function () {
    return View::make('pages.contact');

})->name('contact');

//blog
Route::get('blog', function () {
    return View::make('pages.blog');

})->name('blog');






Route::get('contacts', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Route::post('contacts', [App\Http\Controllers\ContactController::class, 'contactStore'])->name('contactStore');




Route::get('/local/{ln}', [App\Http\Controllers\LanguagesController::class, 'switchLanguage'])->name('setLocale');








// Route group for frontend auth
Route::group(['middleware' => 'auth'], function () {

    // User admin
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('payment/bep20', function () {

        $plans = Plans::orderBy('id', 'asc')->get();

                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'bep20')
        ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.bep20', compact('plans','transactions'));
    })->name('bep20');

    Route::get('payment/trc20', action: function () {

        $plans = Plans::orderBy('id', 'asc')->get();

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'trc20')
        ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.trc20', compact('plans','transactions'));
    })->name('trc20');


    Route::get('payment/erc20', function () {

        $plans = Plans::orderBy('id', 'asc')->get();

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'erc20')
        ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.erc20', compact('plans','transactions'));
    })->name('erc20');


    Route::get('payment/nagad', function () {

        $plans = Plans::orderBy('id', 'asc')->get();

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'nagad')
        ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.nagad', compact('plans','transactions'));
    })->name('nagad');

    Route::get('payment/bkash', function () {

        $plans = Plans::orderBy('id', 'asc')->get();

        $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'bkash')
        ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.bkash', compact('plans','transactions'));
    })->name('bkash');

    Route::get('payment/binance', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'binance')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.binance', compact('plans','transactions'));
    })->name('binance');

        Route::get('payment/bpay', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'bpay')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.bpay', compact('plans','transactions'));
    })->name('bpay');

        Route::get('payment/esewa', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'esewa')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.esewa', compact('plans','transactions'));
    })->name('esewa');


        Route::get('payment/gpay', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'gpay')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.gpay', compact('plans','transactions'));
    })->name('gpay');


        Route::get('payment/ime', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'ime')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.ime', compact('plans','transactions'));
    })->name('ime');


        Route::get('payment/khalti', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'khalti')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.khalti', compact('plans','transactions'));
    })->name('khalti');


        Route::get('payment/osko', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'osko')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.osko', compact('plans','transactions'));
    })->name('osko');


        Route::get('payment/paytm', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'paytm')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.paytm', compact('plans','transactions'));
    })->name('paytm');


        Route::get('payment/phonepe', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'phonepe')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.phonepe', compact('plans','transactions'));
    })->name('phonepe');


        Route::get('payment/poli', function () {

        
                $transactions = Transaction::where('user_id', auth()->user()->id)->where('payment_method', 'poli')
        ->orderBy('id', 'desc')->paginate(10);

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.poli', compact('plans','transactions'));
    })->name('poli');

    //Packages
    Route::get('packages', [App\Http\Controllers\SubscriptionController::class, 'packages'])->name('packages');

    // Show plans
    Route::post('/subscribe/{plan_id}', [App\Http\Controllers\SubscriptionController::class, 'purchase'])->name('subscribe');

    //tasks
    Route::get('tasks', [App\Http\Controllers\TaskController::class, 'tasks'])->name('tasks');

    //task text typing route
    Route::get('text-typing/{id}', [App\Http\Controllers\TaskController::class, 'textTyping'])->name('text_typing');
    Route::post('text-typing/{id}', [App\Http\Controllers\TaskController::class, 'textTypingStore'])->name('text_typing');

    //captcha typing route
    Route::get('captcha-typing/{id}', [App\Http\Controllers\TaskController::class, 'captchaTyping'])->name('math_quiz');
    Route::post('captcha-typing/{id}', [App\Http\Controllers\TaskController::class, 'captchaTypingStore'])->name('math_quiz');

    //image_upload
    Route::get('image-upload/{id}', [App\Http\Controllers\TaskController::class, 'imageUpload'])->name('image_upload');
    Route::post('image-upload/{id}', [App\Http\Controllers\TaskController::class, 'imageUploadStore'])->name('image_upload');

    //video_watch
    Route::get('video-watch/{id}', [App\Http\Controllers\TaskController::class, 'videoWatch'])->name('video_watch');
    Route::post('video-watch/{id}', [App\Http\Controllers\TaskController::class, 'videoWatchStore'])->name('video_watch');

    //task-category
    Route::get('task-category', [App\Http\Controllers\TaskController::class, 'taskCategory'])->name('task_category');
    Route::post('task-category', [App\Http\Controllers\TaskController::class, 'taskCategoryStore'])->name('task_category');

    //diposit
    Route::get('diposit', [App\Http\Controllers\PaymentController::class, 'diposit'])->name('diposit');
    Route::post('diposit', [App\Http\Controllers\PaymentController::class, 'dipositStore'])->name('diposit');

    Route::post('diposits', [App\Http\Controllers\PaymentController::class, 'dipositFake'])->name('dipositFake');


    //withdraw
    Route::get('withdraw', [App\Http\Controllers\PaymentController::class, 'withdraw'])->name('withdraw');
    Route::post('withdraw', [App\Http\Controllers\PaymentController::class, 'withdrawStore'])->name('withdraw');


    //profile
    Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile');

    //referral
    Route::get('referral', [App\Http\Controllers\UserController::class, 'referral'])->name('referral');

    //Transaction
    Route::get('transactions', [App\Http\Controllers\PaymentController::class, 'transactions'])->name('transactions');


    //support
    Route::get('support', [App\Http\Controllers\ContactController::class, 'support'])->name('support');



});







//blog routes
Route::get('blog', [App\Http\Controllers\NewsController::class, 'blog'])->name('blog');

//comment store
Route::post('comment', [App\Http\Controllers\NewsController::class, 'commentStore'])->name('commentStore');

//blogCategory
Route::get('blog/category/{slug}', [App\Http\Controllers\NewsController::class, 'blogCategory'])->name('blogCategory');

Route::get('blog/{slug}', [App\Http\Controllers\NewsController::class, 'blogDetail'])->name('blogDetail');


// fallaback route
Route::fallback(function () {
    return view('404');
});
// Auth::routes();