<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    //packages
    public function packages()
    {
        // Fetch active plans
        $packages = Plans::where('status', 'active')->orderBy('updated_at', 'desc')->get();

        $subscription = Subscription::all();
    
        // Pass the packages variable to the view
        return view('dashboard.plans', compact('packages'));
    }

public function purchase(Request $request, $plan_id)
{
    $user = Auth::user();
    $plan = Plans::findOrFail($plan_id);

    // Step 0: Check if user already has this plan active
    $existingSubscription = Subscription::where('user_id', $user->id)
        ->where('plan_id', $plan->id)
        ->where('status', 'active')
        ->where('expires_at', '>', now())
        ->first();

    if ($existingSubscription) {
        return redirect()->back()->with('error', 'You already have an active subscription for this plan.');
    }

    // Step 1: Deactivate other active subscriptions (if you want only 1 active subscription at a time)
    Subscription::where('user_id', $user->id)
        ->where('status', 'active')
        ->update(['status' => 'canceled']);

    // Step 2: Check wallet balance
    if ($user->wallet_balance < $plan->price) {
        return redirect()->route('diposit')->with('error', 'Insufficient balance. Please fund your wallet.');
    }

    // Step 3: DB Transaction
    DB::beginTransaction();
    try {
        $user->wallet_balance -= $plan->price;
        $user->save();

        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'amount_paid' => $plan->price,
            'start_date' => now(),
            'expires_at' => now()->addDays($plan->duration_days),
            'status' => 'active',
        ]);

        DB::commit();
        return redirect()->route('tasks')->with('success', 'Plan purchased successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}


    
    


}
