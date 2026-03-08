<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Carbon\Carbon;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user) {
            // Latest active subscription
            $subscription = Subscription::where('user_id', $user->id)
                                        ->where('status', 'active')
                                        ->latest('expires_at')
                                        ->first();

            if ($subscription && $subscription->expires_at < now()) {
                $subscription->update(['status' => 'expired']);
            }
        }
        return $next($request);
    }
}
