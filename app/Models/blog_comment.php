<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'post_id',
        'status',
        
        'ip',
        'user_agent',
        
      ];
}
