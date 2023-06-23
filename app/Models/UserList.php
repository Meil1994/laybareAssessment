<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserList extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password' 
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
