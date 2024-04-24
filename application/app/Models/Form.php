<?php

namespace App\Models;

use App\Models\FormInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "name"];

    public function FormInputs(){
        return $this->hasMany(FormInput::class);
    }
}
