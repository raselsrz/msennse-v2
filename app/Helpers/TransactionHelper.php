<?php

namespace App\Helpers;

use App\Models\Transaction;

class TransactionHelper
{
    public static function createTransaction($userId, $amount, $type, $transaction_id, $status = 'pending', $paymentMethod = null, $description = null)
    {
        $allowedStatuses = ['pending', 'completed', 'failed'];
        if (!in_array($status, $allowedStatuses)) {
            \Log::warning("Invalid transaction status: $status. Defaulting to 'pending'.");
            $status = 'pending';
        }

        $transaction = Transaction::where('transaction_id', $transaction_id)->first();

        if ($transaction) {
            $transaction->update(array_filter([
                'status' => $status,
                'payment_method' => $paymentMethod,
                'description' => $description,
            ], fn($v) => !is_null($v)));

            return $transaction;
        }

        return Transaction::create([
            'user_id'        => $userId,
            'amount'         => $amount,
            'transaction_id' => $transaction_id,
            'type'           => $type,
            'status'         => $status,
            'payment_method' => $paymentMethod,
            'description'    => $description,
        ]);
    }
}
