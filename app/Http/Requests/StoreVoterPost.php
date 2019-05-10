<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StoreVoterPost extends FormRequest
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
    public function rules(Request $request)
    {
        $organization = auth()->user()->organization->id;

        return [
            'identity' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('identity', $request->get('identity'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'name' => 'required',
            'email' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('email', $request->get('email'))
                                 ->where('organization_id', $organization);
                }),
            ],
            'phone_number' => [
                'required',
                'unique' => Rule::unique('voters')->where(function($query) use ($request, $organization) {
                    return $query->where('phone_number', $request->get('phone_number'))
                                 ->where('organization_id', $organization);
                }),
            ]
        ];
    }
}
