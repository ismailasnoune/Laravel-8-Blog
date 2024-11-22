<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
    protected $fillable=['title','body','slug','image','user_id'];
    use HasFactory;
    use SoftDeletes;
    public function user(){
        return $this->belongsTo(User::class);
    }
}

