<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public const PUBLIC_ROLES = ['farmer', 'buyer', 'worker', 'seller'];

    public const ALL_ROLES = ['farmer', 'buyer', 'worker', 'seller', 'insemination_agent', 'price_contributor', 'veterinarian', 'administrator'];
}
