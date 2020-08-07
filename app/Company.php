<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @mixin \Eloquent
 *
 * @property integer $id
 * @property string  $name
 * @property string  $email
 * @property string  $url
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property Collection<Employee> $employees
 */

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
