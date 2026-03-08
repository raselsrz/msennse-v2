<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diposit;
use App\Models\Withdraw;
use App\Models\Plans;
use App\Models\CustomFields;
use App\Models\CustomOptions;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helpers\TransactionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\Relation;


class PaymentController extends Controller
{


    //dipositsIndex
    public function dipositsIndex()
    {
        $name = 'Deposits'; 
        $type = 'deposits';
    
        $deposits = Diposit::orderBy('id', 'desc')->paginate(10);
    
        return view('admin.pages.diposits.index', compact('name', 'type', 'deposits'));
    }
    





    //diposit
    public function diposit()
    {

        $name = 'Deposit';
        $type = 'deposit';

        $plans = Plans::orderBy('id', 'asc')->get();

        return view('dashboard.deposit', compact('name', 'type', 'plans'));
    }

    // protected $fillable = ['user_id', 'amount', 'transaction_id', 'status', 'payment_method','phone_number'];


// depositStore
public function dipositStore(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1', // Ensuring the amount is numeric and greater than or equal to 1
        'payment_method' => 'required',
        'transaction_id' => 'required',
        'screenshot' => 'nullable', // Screenshot is only required for specific payment methods
    ]);

    // Check if transaction ID already exists
    if (Diposit::where('transaction_id', $request->transaction_id)->exists()) {
        return redirect()->back()->with('error', 'Transaction ID already exists');
    }

    $screenshot_name = null;

 // If payment method requires a screenshot
        if (in_array($request->payment_method, ['binance', 'trc20', 'erc20', 'bep20','bkash','nagad'])) {
            $request->validate([
                'screenshot' => 'required',
            ]);
    
            if ($request->hasFile('screenshot')) {
                $screenshot = $request->file('screenshot');
                $screenshot_name = time() . '.' . $screenshot->extension();
                $screenshot->move(public_path('uploads'), $screenshot_name);
            }
        }

    // Create a deposit record
    $deposit = new Diposit();
    $deposit->user_id = auth()->user()->id;
    $deposit->amount = $request->amount;
    $deposit->transaction_id = $request->transaction_id;
    $deposit->status = 'pending';
    $deposit->payment_method = $request->payment_method;
    $deposit->phone_number = $request->phone_number ?? 0; // Default to null if not provided
    $deposit->screenshot = $screenshot_name; // Store screenshot filename if exists
    
    
    // if($screenshot_name){
    //         update_field('screenshot', $screenshot_name, 'screenshot', $deposit->id);
    //     }
    
    
    $deposit->save();

    // Log the transaction
    TransactionHelper::createTransaction(auth()->user()->id, $request->amount, 'deposit', $request->transaction_id, 'pending', $request->payment_method, 'Deposit to wallet');

    return redirect()->back()->with('success', 'Deposit successful');
}


public function dipositFake(Request $request)
{
    return back()->with('error', 'Please provide valid details.');
}



    
    


public function dipositsApprove(Request $request, $id)
{
    $diposit = Diposit::find($id);
    if (!$diposit) {
        return redirect()->back()->with('error', 'Deposit not found');
    }

    $user = User::find($diposit->user_id);
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $previousStatus = $diposit->status;
    $diposit->status = $request->status;
    $diposit->save();

    // Deposit Approved
    if ($request->status == 'completed' && $previousStatus != 'completed') {
        $user->increment('wallet_balance', $diposit->amount);

        TransactionHelper::createTransaction(
            $diposit->user_id, 
            $diposit->amount, 
            'deposit',
            $diposit->transaction_id,
            'completed', 
            $diposit->payment_method, 
            'Deposit approved and added to wallet'
        );

        // Referral Bonus Logic
        if ($user->referrer_id) {
            $referrer = User::find($user->referrer_id);
            if ($referrer) {
                // Increment referral count
                $referrer->increment('referral_count');

                // If referral count >= 3, give bonus
                if ($referrer->referral_count >= 3) {
                    $referrer->increment('wallet_balance', get_option('refer_commission', ''));
                    $referrer->increment('referral_earnings', get_option('refer_commission', ''));

                    // Optional: add transaction log
                    TransactionHelper::createTransaction(
                        $referrer->id,
                        get_option('refer_commission', ''),
                        'referral_bonus',
                        'ref_' . uniqid(),
                        'completed',
                        'system',
                        'Referral bonus credited'
                    );
                }
            }
        }

    }
    // Revert Wallet on Rejected
    elseif (($request->status == 'pending' || $request->status == 'failed') && $previousStatus == 'completed') {
        $user->decrement('wallet_balance', $diposit->amount);

        TransactionHelper::createTransaction(
            $diposit->user_id, 
            $diposit->amount, 
            'deposit',
            $diposit->transaction_id,
            $request->status, 
            $diposit->payment_method, 
            'Deposit ' . $request->status
        );
    }

    return redirect()->back()->with('success', 'Deposit Status Updated');
}
   
    

    //dipositsDelete
    public function dipositsDelete($id)
    {
        $diposit = Diposit::find($id);
        $diposit->delete();

        return redirect()->back()->with('success', 'Deposit deleted');
    }






    //withdrawalsIndex
    public function withdrawalsIndex()
    {
        $name = 'Withdrawals'; 
        $type = 'withdraw'; 
    
        $withdrawals = Withdraw::orderBy('id', 'desc')->paginate(10);

       
    
        return view('admin.pages.withdrawals.index', compact('name', 'type', 'withdrawals'));
    }

    //withdrawalsApprove
    public function withdrawalsApprove(Request $request, $id)
    {
        $withdraw = Withdraw::find($id);
    
        if (!$withdraw) {
            return redirect()->back()->with('error', 'Withdrawal not found');
        }
    
        // Retrieve the actual user model
        $user = User::find($withdraw->user_id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        // Check previous status before updating
        $previousStatus = $withdraw->status;
        $withdraw->status = $request->status;
    
        // Only update total_withdrawn if the withdrawal is being approved for the first time
        if ($request->status == 'completed' && $previousStatus != 'completed') {
            $user->total_withdrawn += $withdraw->amount;
        }
    
        // If the withdrawal was previously completed and is now being reverted to pending or failed,
        // deduct the amount from total_withdrawn
        elseif (($request->status == 'pending' || $request->status == 'failed') && $previousStatus == 'completed') {
            $user->total_withdrawn -= $withdraw->amount;
        }
    
        // Save the withdrawal and user changes
        $withdraw->save();
        $user->save();
    
        // Only deduct balance if withdrawal is approved and was NOT already deducted
        if ($request->status == 'completed' && $previousStatus != 'completed') {
            $user->wallet_balance -= $withdraw->amount;
            $user->save();
    
            TransactionHelper::createTransaction(
                $withdraw->user_id, 
                $withdraw->amount, 
                'withdrawal', 
                'completed', 
                $withdraw->payment_method, 
                'Withdrawal approved and deducted from wallet'
            );
        }
    
        // Only add balance if withdrawal was previously completed
        elseif (($request->status == 'pending' || $request->status == 'failed') && $previousStatus == 'completed') {
            $user->wallet_balance += $withdraw->amount;
            $user->save();
    
            TransactionHelper::createTransaction(
                $withdraw->user_id, 
                $withdraw->amount, 
                'withdrawal', 
                $request->status, 
                $withdraw->payment_method, 
                'Withdrawal ' . $request->status
            );
        }
    
        return redirect()->back()->with('success', 'Withdrawal Status Updated');
    }

    //withdrawalsDelete 
    public function withdrawalsDelete($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->delete();

        return redirect()->back()->with('success', 'Withdrawal deleted');
    }




    //withdraw
    public function withdraw()
    {

        $name = 'Withdraw';
        $type = 'withdraw';


        $transactions = Withdraw::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        $user = Auth::user();
        return view('dashboard.withdraw', compact('name', 'type', 'user','transactions'));
    }

    //withdrawStore

public function withdrawStore(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric',
        'payment_method' => 'required',
        'bkash_number' => 'nullable|numeric',
        'nagad_number' => 'nullable|numeric',
        'binance_address' => 'nullable|string',
        'bep20_address' => 'nullable|string',
        'erc20_address' => 'nullable|string',
        'trc20_address' => 'nullable|string',
    ]);

    $user = Auth::user();

    // Check the last deposit for this user
    $lastDeposit = Diposit::where('user_id', $user->id)
        ->where('status', 'completed')
        ->orderBy('created_at', 'desc')
        ->first();

    if ($lastDeposit) {
        $availableWithdrawDate = Carbon::parse($lastDeposit->created_at)->addDays(40);
        if (Carbon::now()->lt($availableWithdrawDate)) {
            $remainingDays = Carbon::now()->diffInDays($availableWithdrawDate);
            return redirect()->back()->with('error', "You can withdraw only after {$remainingDays} days");
        }
    }

    // Count the number of withdrawals this month
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;
    $withdrawCount = Withdraw::where('user_id', $user->id)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->count();

    if ($withdrawCount >= 2) {
        return redirect()->back()->with('error', 'You can only withdraw up to 2 times per month.');
    }

    // Minimum withdrawal checks
    if ($request->payment_method == 'bkash' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for bKash is 23 $');
    }
    
    if ($request->payment_method == 'nagad' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for Nagad is 23 $');
    }
    
    if ($request->payment_method == 'binance' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for Binance is 23 $');
    }
    
    if ($request->payment_method == 'bep20_address' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for BEP20 is 23 $');
    }
    
    if ($request->payment_method == 'erc20_address' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for ERC20 is 23 $');
    }
    
    if ($request->payment_method == 'trc20_address' && $request->amount < get_option('withdraw_minimum', '')) {
        return redirect()->back()->with('error', 'Minimum withdrawal amount for TRC20 is 23 $');
    }

    if ($user->wallet_balance < $request->amount) {
        return redirect()->back()->with('error', 'Your wallet balance is insufficient');
    }

    // Get the correct account number based on the selected payment method
    $accountNumber = $request->bkash_number ?? $request->nagad_number ?? $request->binance_address ?? $request->bep20_address ?? $request->erc20_address ?? $request->trc20_address;

    if (!$accountNumber) {
        return redirect()->back()->with('error', 'Please provide valid payment details');
    }

    $user->decrement('wallet_balance', $request->amount);

    $withdraw = new Withdraw();
    $withdraw->user_id = $user->id;
    $withdraw->amount = $request->amount;
    $withdraw->status = 'pending';
    $withdraw->payment_method = $request->payment_method;
    $withdraw->account_number = $accountNumber;
    $withdraw->save();

    TransactionHelper::createTransaction(
        $user->id, 
        $request->amount, 
        'withdrawal',
        'this is withdraw', 
        'pending', 
        $request->payment_method, 
        'Withdraw from wallet'
    );

    return redirect()->back()->with('success', 'Withdraw request submitted successfully.');
}

    



    //Transactions by user
    public function transactions()
    {
        $name = 'Transactions';
        $type = 'transactions';

        $transactions = Transaction::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.transactions', compact('name', 'type', 'transactions'));
    }



}
