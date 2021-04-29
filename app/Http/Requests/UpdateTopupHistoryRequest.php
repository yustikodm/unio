<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TopupHistory;

class UpdateTopupHistoryRequest extends FormRequest
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
        $rules = TopupHistory::$rules;
        $rules['code'] = 'unique:topup_history,code,'.$this->topuphistory;

        return $rules;
    }
}
