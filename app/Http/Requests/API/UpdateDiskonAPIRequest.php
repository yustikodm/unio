<?php

namespace App\Http\Requests\API;

use App\Models\Diskon;
use InfyOm\Generator\Request\APIRequest;

class UpdateDiskonAPIRequest extends APIRequest
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
        $rules = Diskon::$rules;
        $rules['barang_id'] = $rules['barang_id'].",".$this->route("diskon");
        return $rules;
    }
}
