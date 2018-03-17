<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyBill extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'month', 'house_rent', 'utility_bill', 'food_bill', 'due_amount', 'user_id'
    ];
}
