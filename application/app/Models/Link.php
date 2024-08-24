<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ["position", "text", "to", "weight"];

    public function GroupLinks()
    {
        return $this->hasMany(GroupLink::class);
    }
}
