<?php

namespace App\Http\Requests;

class ClientFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'            => 'required',
            'phone'           => 'required|numeric',
            'email'           => 'required|email',
            'gender'          => 'required',
            'address'         => 'required',
            'nationality'     => 'required',
            'year'            => 'required',
            'month'           => 'required',
            'day'             => 'required',
            'mode_of_contact' => 'required',
            //
        ];
    }
}
