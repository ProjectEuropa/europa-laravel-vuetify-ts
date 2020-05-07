<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventNoticeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'eventName'          => 'required|max:100',
          'eventDetails'       => 'required|max:255',
          'eventReferenceUrl'  => 'required|max:100',
          'eventClosingDay'    => 'required|max:10',
          'eventDisplayingDay' => 'required|max:10',
          'eventType'          => 'required',
        ];
    }
}
