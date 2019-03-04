<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['title','filename','group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
