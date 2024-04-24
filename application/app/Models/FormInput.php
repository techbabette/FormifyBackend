<?php

namespace App\Models;

use App\Models\Input;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    use HasFactory;

    protected $fillable = ["form_id", "input_id", "label", "weight", "width", "required", "regex"];

    public function Options(){
        return $this->hasMany(Option::class);
    }

    public function SimpleOptions(){
        return $this->hasMany(Option::class)->select(['form_input_id', 'value']);
    }

    public function Input(){
        return $this->belongsTo(Input::class);
    }
}
