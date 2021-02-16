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
//            'billing.email' => 'required',
//            'billing.address' => 'required',
//            'shipping.address' => 'required',
//            'shipping.postalcode' => 'required',
            'paymentMethodId' => 'required',
        ];
    }

    public function attributes()
    {
        return [
          'billing.firstname' => 'Billing Firstname',
          'billing.lastname' => 'Billing Lastname',
          'billing.email' => 'Billing Email',
          'billing.address' => 'Billing Address',
          'shipping.address' => 'Shipping Address',
          'shipping.postalcode' => 'Shipping Postal Code',
          'payment.token' => 'Stripe Card Token',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required.',
        ];
    }
}
