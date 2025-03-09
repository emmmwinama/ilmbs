<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'account_name',
    ];

    public function loan(){
        return $this->hasMany(Loan::class, 'account_id');
    }
}
