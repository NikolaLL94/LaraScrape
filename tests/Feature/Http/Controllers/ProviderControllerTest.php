<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProviderController
 */
class ProviderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $providers = Provider::factory()->count(3)->create();

        $response = $this->get(route('provider.index'));

        $response->assertOk();
        $response->assertViewIs('provider.index');
        $response->assertViewHas('providers');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $provider = Provider::factory()->create();

        $response = $this->get(route('provider.show', $provider));

        $response->assertOk();
        $response->assertViewIs('provider.show');
        $response->assertViewHas('provider');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('provider.create'));

        $response->assertOk();
        $response->assertViewIs('provider.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProviderController::class,
            'store',
            \App\Http\Requests\ProviderStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $mailer = $this->faker->word;
        $host = $this->faker->word;
        $port = $this->faker->word;
        $username = $this->faker->userName;
        $password = $this->faker->password;
        $encryption = $this->faker->word;
        $from_address = $this->faker->word;
        $from_name = $this->faker->word;
        $default = $this->faker->boolean;
        $webhook_url = $this->faker->text;
        $webhook_format = $this->faker->text;

        $response = $this->post(route('provider.store'), [
            'name' => $name,
            'mailer' => $mailer,
            'host' => $host,
            'port' => $port,
            'username' => $username,
            'password' => $password,
            'encryption' => $encryption,
            'from_address' => $from_address,
            'from_name' => $from_name,
            'default' => $default,
            'webhook_url' => $webhook_url,
            'webhook_format' => $webhook_format,
        ]);

        $providers = Provider::query()
            ->where('name', $name)
            ->where('mailer', $mailer)
            ->where('host', $host)
            ->where('port', $port)
            ->where('username', $username)
            ->where('password', $password)
            ->where('encryption', $encryption)
            ->where('from_address', $from_address)
            ->where('from_name', $from_name)
            ->where('default', $default)
            ->where('webhook_url', $webhook_url)
            ->where('webhook_format', $webhook_format)
            ->get();
        $this->assertCount(1, $providers);
        $provider = $providers->first();

        $response->assertRedirect(route('provider.index'));
        $response->assertSessionHas('provider.name', $provider->name);
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $provider = Provider::factory()->create();

        $response = $this->get(route('provider.edit', $provider));

        $response->assertOk();
        $response->assertViewIs('provider.edit');
        $response->assertViewHas('provider');
    }
}
