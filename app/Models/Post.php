<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    public function user(){
        return $this->hasOne(User::class);
    }
    
    public function category(){
        return $this->hasOne(Category::class, 'category_id');
    }
}
