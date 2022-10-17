<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;

class Studend extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','major','location','major_id'
    ];
   
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}

