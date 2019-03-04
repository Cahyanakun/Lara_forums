<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'decription', 'user_id', 'image'];
    public function users()
    {
        return $this->belongsToMany('App\User', 'group_members');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function file()
    {
        return $this->hasMany(File::class);
    }
}
