<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'module',
        'title',
        'description',
        'image',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_course');
    }


}
