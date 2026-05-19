<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'membership_id',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
