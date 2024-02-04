<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'team1' => 'required',
            'team2' => 'required|different:team1',
            'date' => 'date|after:now'
        ];
    }


    public function messages(){
        return [
        'team2.different' => 'Team1 and Team2 must be different',
        'date.after' => 'The match can be played a day after today',
        ];
    }
}
