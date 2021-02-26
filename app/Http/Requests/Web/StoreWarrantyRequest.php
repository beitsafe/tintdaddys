<?php
namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarrantyRequest extends FormRequest
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
            'installerCompanyPerson' => 'required',
            'customerAddress' => 'required',
            'vehicleInstallationDate' => 'required',
        ];
    }

    public function attributes()
    {
        return [
          'installerCompanyPerson' => 'Contact Person',
          'customerAddress' => 'Customer Address',
          'vehicleInstallationDate' => 'Installation Date',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required.',
        ];
    }
}
