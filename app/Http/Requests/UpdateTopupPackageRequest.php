<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TopupPackage;

class UpdateTopupPackageRequest extends FormRequest
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
        $rules = TopupPackage::$rules;
        $rules['code'] = 'unique:topup_packages,code,'.$this->topuppackage;
        
        return $rules;
    }
}
