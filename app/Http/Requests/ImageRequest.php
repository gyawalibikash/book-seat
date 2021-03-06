<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageRequest extends Request
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
            'moviename'=>'required',
            // 'poster'=>'required|mimes:jpg,jpeg,png',
            'description' => 'required',
            'release_date' => 'required',
            'run_time' => 'required',
            'cast'=> 'required',
            'director'=> 'required'
        ];
    }
}
