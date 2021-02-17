<?php
namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
//            'billing.firstname' => 'required',
//            'billing.lastname' => 'required',
            'client.email' => 'required',
//            'billing.address' => 'required',
//            'shipping.address' => 'required',
//            'shipping.postalcode' => 'required',
            'paymentMethodId' => 'required',
        ];
    }

    public function attributes()
    {
        return [
          'client.email' => 'Billing Email',
          'paymentMethodId' => 'Credit/Debit Card',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required.',
        ];
    }
}
