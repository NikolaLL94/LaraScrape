<?php

namespace App\Http\Requests;

use App\Rules\ProviderDefaultValue;
use Illuminate\Foundation\Http\FormRequest;

class ProviderStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'mailer' => ['required', 'string', 'max:100'],
            'host' => ['required', 'string', 'max:100'],
            'port' => ['required', 'string'],
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100'],
            'encryption' => ['required', 'string', 'max:100'],
            'from_address' => ['required', 'string', 'max:100'],
            'from_name' => ['required', 'string', 'max:100'],
            'project_id' => ['required'],
            'default' => ['required', new ProviderDefaultValue($this->request)],
            'webhook_url' => ['required', 'string'],
            'webhook_format' => ['required', 'string']
        ];
    }
}
