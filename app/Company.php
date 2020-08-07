<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'url'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
