<?php

use App\Models\Hack;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HacksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function user_can_submit_a_new_hack()
    {
        $this->withoutExceptionHandling();

        //arrange
        $attributes = [
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'text' => $this->faker->paragraph
        ];

        //act
        $this->post('/hacks', $attributes)->assertRedirect('/');

        //assert
        $this->assertDatabaseHas('hacks', $attributes);
        $this->get('/')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_hack_requires_a_title()
    {
        $attributes = Hack::factory()->raw(['title' => '']);

        $this->post('/hacks', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_hack_has_a_valid_url()
    {
        $attributes = Hack::factory()->raw(['url' => 'googledotcom']);

        $this->post('/hacks', $attributes)->assertSessionHasErrors('url');
    }

    /** @test */
    public function a_hack_requires_a_text()
    {
        $attributes = Hack::factory()->raw(['text' => '']);

        $this->post('/hacks', $attributes)->assertSessionHasErrors('text');
    }

    /** @test */
    public function a_user_can_view_a_hack()
    {
        $this->withoutExceptionHandling();

        $hack = Hack::factory()->create();

        $this->get($hack->path())
            ->assertSee($hack->title);
    }

}
