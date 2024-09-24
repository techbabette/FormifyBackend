<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseValue extends Model
{
    use HasFactory;

    protected $fillable = ["response_id", "value", "form_input_id"];

    public function formInput()
    {
        return $this->belongsTo(FormInput::class);
    }
}
