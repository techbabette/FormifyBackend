<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ["name", "is_default_unauthenticated", "is_default_registered"];

    public function permissions() {
        return $this->hasMany(GroupPermission::class);
    }
}
