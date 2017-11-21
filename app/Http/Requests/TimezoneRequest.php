<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TimezoneRequest extends Request
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
            'from-region' => 'required',
            'from-zone'   => 'required',
            'from-date'   => 'required',
            'from-time'   => 'required',
            'to-region'   => 'required',
            'to-zone'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'from-region.required' => 'The Convert From Region is required',
            'from-zone.required'   => 'The Convert From Time Zone is required',
            'from-date.required'   => 'The Date is required',
            'from-time.required'   => 'The Time is required',
            'to-region.required'   => 'The Convert To Region is required',
            'to-zone.required'     => 'The Convert To Time Zone is required'
        ];
    }
}
