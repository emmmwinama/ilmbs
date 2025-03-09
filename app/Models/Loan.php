<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'loan_amount',
        'loan_term',
        'interest_rate',
        'status'
    ];

    public function account(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function repaymentSchedule(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RepaymentSchedule::class);
    }
}
