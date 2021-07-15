<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoroscopeRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'zodiac_id' => 'required|integer|min:1|max:12',
                'year' => 'required|integer|min:2015|max:2050'
            ];
        }
        else{
            return [];
        }
    }

    public function messages(){
        if ($this->isMethod('post')) {
            return [
                'zodiac_id.required' => 'Please select your zodiac sign',
                'year.required' => 'Please select year',
            ];
        }
        else{
            return [];
        }
    }
}
