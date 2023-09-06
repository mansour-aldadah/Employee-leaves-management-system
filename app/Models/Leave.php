<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'employee_id', 'duration', 'start_date', 'status', 'type', 'reason'];
}
