<?php

namespace App\Implementation\FormService;

use App\Interfaces\FormService\IGetForm;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Models\Form;
use App\Exceptions\EntityNotFoundException;

class GetFormEloquentRedis implements IGetForm{
    public function execute (int $id) : object{
        $cacheIdentifier = "form:full:$id";
        $cacheDurationSeconds = 300;
        Redis::incr('times_tried');
        $form = Cache::remember($cacheIdentifier, $cacheDurationSeconds, function () use ($id) {
            $result = Form::with('FormInputs.SimpleOptions', 'FormInputs.Input')->find($id);

            if ($result == null) {
                throw new EntityNotFoundException("Form", $id);
            }

            return Form::with('FormInputs.SimpleOptions', 'FormInputs.Input')->find($id);
        });
        return $form;
    }
}
?>