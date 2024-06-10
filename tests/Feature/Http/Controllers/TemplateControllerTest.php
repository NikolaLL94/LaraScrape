<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use App\Models\Template;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TemplateController
 */
class TemplateControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $templates = Template::factory()->count(3)->create();

        $response = $this->get(route('template.index'));

        $response->assertOk();
        $response->assertViewIs('template.index');
        $response->assertViewHas('templates');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $template = Template::factory()->create();

        $response = $this->get(route('template.show', $template));

        $response->assertOk();
        $response->assertViewIs('template.show');
        $response->assertViewHas('template');
        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('template.create'));

        $response->assertOk();
        $response->assertViewIs('template.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TemplateController::class,
            'store',
            \App\Http\Requests\TemplateStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $subject = $this->faker->word;
        $body = $this->faker->text;

        $response = $this->post(route('template.store'), [
            'subject' => $subject,
            'body' => $body,
        ]);

        $templates = Template::query()
            ->where('subject', $subject)
            ->where('body', $body)
            ->get();
        $this->assertCount(1, $templates);
        $template = $templates->first();

        $response->assertRedirect(route('template.index'));
        $response->assertSessionHas('template.name', $template->name);
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $template = Template::factory()->create();
        $template = Project::factory()->create();

        $response = $this->get(route('template.edit', $template));

        $response->assertOk();
        $response->assertViewIs('template.edit');
        $response->assertViewHas('template');
    }
}
