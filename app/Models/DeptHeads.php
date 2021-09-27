<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptHeads extends Model {
    use HasFactory;

    protected $guarded = [
        'id',
        'EmpID',
        'status',

    ];
}
