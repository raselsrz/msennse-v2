<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Tasks;
use App\Models\Subscription;
use App\Models\CompletedTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    //index
    public function index()
    {
        $name = 'Task List';
        $type = 'task';

        $tasks = Tasks::where('status', 'active')->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.tasks.index', compact('name', 'type','tasks'));
    }

    //add
    public function add()
    {
        $name = 'Add Task';
        $type = 'task';

        //plan
        $plans = Plans::where('status', 'active')->get();

        return view('admin.pages.tasks.add', compact('name', 'type','plans'));
    }

    //store
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'plan_id' => 'required',
            'price' => 'required',
        ]);

        $task = new Tasks();
        $task->task_name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type;
        $task->status = 'active';
        $task->plan_id = $request->plan_id;
        $task->price = $request->price;
        $task->save();


        //video_link
        if ($request->video_link) {
            update_field('video_link', $request->video_link, 'task', $task->id);
        }


        return redirect()->route('admin.tasks.edit', $task->id)->with('success', 'Task added successfully');
    }

    //edit
    public function edit($id)
    {
        $name = 'Edit Task';
        $type = 'task';

        $task = Tasks::find($id);

        //plan
        $plans = Plans::where('status', 'active')->get();

        return view('admin.pages.tasks.edit', compact('name', 'type','task','plans'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'plan_id' => 'required',
            'price' => 'required',
        ]);

        $task = Tasks::find($id);
        $task->task_name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type;
        $task->status = $request->status;
        $task->plan_id = $request->plan_id;
        $task->price = $request->price;
        $task->save();

        //video_link
        if ($request->video_link) {
            update_field('video_link', $request->video_link, 'task', $task->id);
        }

        return redirect()->route('admin.tasks.edit', $task->id)->with('success', 'Task updated successfully');
    }

    //delete
    public function delete($id)
    {
        $task = Tasks::find($id);
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully');
    }

    public function tasks()
    {
        $name = 'Task List';
        $type = 'task';
    
        // Get the logged-in user
        $user = Auth::user();
    
        // Check if the user has selected a task category
        if (empty($user->task_cat)) {
            return $user->subscription()->exists()
                ? redirect()->route('task_category')
                : redirect()->route('packages')->with('error', 'Please subscribe to a plan');
        }
    
        // Get the user's active subscription
        $subscription = Subscription::where('user_id', $user->id)
            ->where('status', 'active')
            ->where('expires_at', '>', Carbon::now())
            ->first();
    
        // Check if subscription exists and is valid
        if (!$subscription) {
            return redirect()->route('packages')->with('error', 'Your subscription has expired or is inactive. Please renew your subscription.');
        }
    
        // Get the user's daily work limit
        $dailyWorkLimit = $subscription->daily_work;
    
        // Get task IDs completed in the last 24 hours
        $completedTaskIds = CompletedTask::where('user_id', $user->id)
    ->where('created_at', '>=', Carbon::now()->subDay()) // This will get tasks completed in the last 24 hours
    ->pluck('task_id')
    ->toArray();
    
        // Fetch tasks based on the user's subscription and category
        $tasks = Tasks::where('plan_id', $subscription->plan_id)
            ->where('status', 'active')
            ->where('type', $user->task_cat) // Filter by user's selected category
            ->whereNotIn('id', $completedTaskIds) // Exclude recently completed tasks
            ->paginate($dailyWorkLimit); // Paginate results
    
        return view('dashboard.task', compact('name', 'type', 'tasks'));
    }
    
    
    


    

    //textTyping 
    public function textTyping(Request $request, $id)
    {
        $name = 'Text Typing';
        $type = 'text_typing';

        $task = Tasks::find($id);

        return view('dashboard.text-typing', compact('name', 'type', 'task'));
    }


    public function textTypingStore(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|min:60',
        ]);
    
        $task = Tasks::findOrFail($id);
    
        // Store task completion with timestamp
        $completedTask = new CompletedTask();
        $completedTask->user_id = Auth::id();
        $completedTask->task_id = $task->id;
        $completedTask->created_at = Carbon::now(); // Ensure timestamp is store
        $completedTask->save();

        //task Completed then user wallet_balance ++

        $user = Auth::user();

        $user->wallet_balance += $task->price;
        $user->save();

    
        // Store user-submitted text
        $text = $request->input('text');
        if ($text) {
            update_field('text', $text, 'textTyping', $completedTask->id);
        }
    
        return redirect()->route('tasks')->with('success', 'Task completed successfully.');
    }
    


    //imageUpload
    public function imageUpload(Request $request, $id)
    {
        $name = 'Image Upload';
        $type = 'image_upload';

        $task = Tasks::find($id);

        return view('dashboard.image-upload', compact('name', 'type', 'task'));
    }

//imageUploadStore
public function imageUploadStore(Request $request, $id)
{

    $type = 'image_upload';

    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $task = Tasks::find($id);

    $completedTask = new CompletedTask();
    $completedTask->user_id = Auth::id();
    $completedTask->task_id = $task->id;
    $completedTask->created_at = Carbon::now();

    $completedTask->save();


    $user = Auth::user();

    $user->wallet_balance += $task->price;
    $user->save();

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        //name chack exzist or not
        if (file_exists(public_path('uploads/' . $image->getClientOriginalName()))) {
            return redirect()->back()->with('error', 'Image already exists please try another image');
        }

        //image orginal name
        $imageName = $image->getClientOriginalName();


        $imagePath = public_path('/uploads');
        $image->move($imagePath, $imageName);

        // Create public URL for the uploaded image
        $publicImageUrl = asset('uploads/' . $imageName);

        // Save the image URL in the custom field
        update_field('image', $publicImageUrl, $type, $completedTask->id);
    }

    return redirect()->route('tasks')->with('success', 'Task completed successfully');
}

// Video Watch Controller
public function videoWatch(Request $request, $id)
{
    $name = 'Video Watch';
    $type = 'video_watch';

    $task = Tasks::find($id);

    return view('dashboard.video-watch', compact('name', 'type', 'task'));
}

// Video Watch Store Controller
public function videoWatchStore(Request $request, $id)
{
    $type = 'video_watch';

    $request->validate([
        'watch_percentage' => 'required',
    ]);

    $task = Tasks::find($id);

    $completedTask = new CompletedTask();
    $completedTask->user_id = Auth::id();
    $completedTask->task_id = $task->id;
    $completedTask->created_at = Carbon::now();
    $completedTask->save();

    $user = Auth::user();
    $user->wallet_balance += $task->price;
    $user->save();

    $watch_percentage = $request->input('watch_percentage');
    if ($watch_percentage) {
        update_field('watch_percentage', $watch_percentage, $type, $completedTask->id);
    }

    return redirect()->route('tasks')->with('success', 'Task completed successfully');
}
    


    //captchaTyping
    public function captchaTyping($id)
    {
        $name = 'Captcha Typing';
        $type = 'math_quiz';
    
        // Find the task
        $task = Tasks::findOrFail($id);
    
        // Generate a random math question
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
    
        // Calculate the correct answer safely
        switch ($operator) {
            case '+':
                $answer = $num1 + $num2;
                break;
            case '-':
                $answer = $num1 - $num2;
                break;
            case '*':
                $answer = $num1 * $num2;
                break;
        }
    
        // Store question and answer in session
        session([
            'captcha_question' => "$num1 $operator $num2 = ?",
            'captcha_answer' => $answer
        ]);
    
        return view('dashboard.math-quiz', compact('name', 'type', 'task', 'num1', 'num2', 'operator'));
    }
    

    //captchaTypingStore
    public function captchaTypingStore(Request $request, $id)
    {
        $type = 'math_quiz';

        $request->validate([
            'answer' => 'required|numeric',
        ]);

        $correctAnswer = session('captcha_answer');
        $userAnswer = $request->input('answer');
    
        if ($userAnswer != $correctAnswer) {
            $task = Tasks::find($id);
            $completedTask = new CompletedTask();
            $completedTask->user_id = Auth::id();
            $completedTask->task_id = $task->id;
            $completedTask->created_at = Carbon::now();
            $completedTask->save();

            return redirect()->route('tasks')->with('error', 'Incorrect answer. Task failed.');
        }

        $task = Tasks::find($id);

        $completedTask = new CompletedTask();
        $completedTask->user_id = Auth::id();
        $completedTask->task_id = $task->id;
        $completedTask->created_at = Carbon::now();

        $completedTask->save();

        $user = Auth::user();

        $user->wallet_balance += $task->price;
        $user->save();

        $answer = $request->input('answer');
        if ($answer) {
            update_field('answer', $answer, $type, $completedTask->id);
        }

        return redirect()->route('tasks')->with('success', 'Task completed successfully');
    }


    public function taskCategory()
    {
        $user = Auth::user();
    
        // If user has already selected a task category, redirect to tasks page
        if (!empty($user->task_cat)) {
            return redirect()->route('tasks');
        }
    
        $name = 'Task Category';
        $type = 'task_category';
    
        return view('dashboard.task-cat', compact('name', 'type'));
    }
    



    //taskCategoryStore
    public function taskCategoryStore(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $user = Auth::user();
        $user->task_cat = $request->type;
        $user->save();

        return redirect()->route('tasks')->with('success', 'Task category selected successfully');
    }




}
