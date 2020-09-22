<?php

namespace App\Http\Requests;

use App\Rules\OtherUser;
use Illuminate\Foundation\Http\FormRequest;

class MatchCreateRequest extends FormRequest
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
            'opponent_id' => ['required', 'integer', 'max:100000', 'exists:users,id', new OtherUser()]
        ];
    }
}
