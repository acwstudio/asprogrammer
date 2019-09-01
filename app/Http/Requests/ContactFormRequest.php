<?php

namespace App\Http\Requests;

use App\Rules\HoneypotRule;
use Illuminate\Foundation\Http\FormRequest;
use Log;

/**
 * Class ContactFormRequest
 *
 * @package App\Http\Requests
 */
class ContactFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'life_cycle' => new HoneypotRule(5),
            'pests' => 'size:0',
        ];
    }

    /**
     * @param \Illuminate\Validation\Validator $validator
     */
    public function withValidator($validator)
    {
        if (!empty($validator->errors())) {
            foreach ($validator->errors()->toArray() as $key => $error){
                if ($key === 'pests'){
//                    Log::warning("spam bot filled in hidden field");
                    Log::warning("spam bot filled in hidden field");
                }
                if ($key === 'life_cycle'){
//                    Log::warning("spam bot sent email too quickly");
                    Log::warning("spam bot sent email too quickly");
                }
            }
        }
    }
}
