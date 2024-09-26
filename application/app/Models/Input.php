<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable = ["text", "type"];

    public static function typesWithOptions(){
        return [3, 4, 5];
    }
}
