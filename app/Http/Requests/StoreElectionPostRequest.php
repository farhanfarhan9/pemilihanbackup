<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreElectionPostRequest extends FormRequest
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
            // 'name' => 'required',
            // 'voting_starts_on' => 'required|after:now|date_format:d-m-Y H:i',
            // 'voting_ends_on' => 'required|after:voting_starts_on|date_format:d-m-Y H:i',
        ];
    }

    public function validated()
    {
        $validated = $this->validator->validated();
        
        $validated['voting_starts_on'] = Carbon::createFromFormat('d-m-Y H:i', $this->voting_starts_on);
        $validated['voting_ends_on'] = Carbon::createFromFormat('d-m-Y H:i', $this->voting_ends_on);

        return $validated;
    }

}
