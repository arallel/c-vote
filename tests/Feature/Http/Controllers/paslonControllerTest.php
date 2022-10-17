<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Paslon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\paslonController
 */
class paslonControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $paslons = paslon::factory()->count(3)->create();

        $response = $this->get(route('paslon.index'));

        $response->assertOk();
        $response->assertViewIs('admin.paslon.index');
        $response->assertViewHas('paslon');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('paslon.create'));

        $response->assertOk();
        $response->assertViewIs('admin.paslon.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\paslonController::class,
            'store',
            \App\Http\Requests\paslonStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('paslon.store'));

        $response->assertRedirect(route('admin.paslon.index'));

        $this->assertDatabaseHas(paslons, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\paslonController::class,
            'update',
            \App\Http\Requests\paslonUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $paslon = paslon::factory()->create();

        $response = $this->put(route('paslon.update', $paslon));

        $paslon->refresh();
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $paslon = paslon::factory()->create();

        $response = $this->get(route('paslon.edit', $paslon));

        $response->assertOk();
        $response->assertViewIs('admin.paslon.edit');
        $response->assertViewHas('paslon');
    }
}
