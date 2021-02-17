<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontrakmk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['mahasiswa_id','semester_id',];
}
