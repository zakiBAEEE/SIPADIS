<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function disposisiDikirim()
    {
        return $this->hasMany(Disposisi::class, 'dari_role_id');
    }

}
