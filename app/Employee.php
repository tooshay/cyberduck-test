<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * @mixin \Eloquent
 *
 * @property integer $id
 * @property string  $first_name
 * @property string  $last_name
 * @property string  $email
 * @property string  $phone
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property Company $employees
 */

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id'
    ];

    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
