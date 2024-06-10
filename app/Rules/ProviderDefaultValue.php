<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Project;

class ProviderDefaultValue implements Rule
{
    private $request;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function passes($attribute, $value)
    {
        $project = Project::with('providers')->where('id', $this->request->all()['project_id'])->first();

        $providers = $project->providers->filter(function ($provider) {
            return $provider->id_default;
        });

        return !!$providers->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Project requires at least one default provider. Please mark default value as true';
    }
}
