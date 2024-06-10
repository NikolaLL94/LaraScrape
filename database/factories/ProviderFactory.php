<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Provider;

class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mailer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'host' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'port' => $this->faker->word,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'encryption' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'from_address' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'from_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'default' => $this->faker->boolean,
            'webhook_url' => $this->faker->text,
            'webhook_format' => $this->faker->text,
        ];
    }
}
