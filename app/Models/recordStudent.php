<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordStudent extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "recordstudents";
    protected $fillable = ['name', 'date', 'status', 'remark'];

}
