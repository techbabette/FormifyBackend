<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLink extends Model
{
    use HasFactory;

    protected $fillable = ["group_id", "link_id"];
}
