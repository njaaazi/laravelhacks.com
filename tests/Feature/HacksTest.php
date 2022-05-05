<?php

use App\Models\Hack;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HacksTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function user_can_submit_a_new_hack()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'text' => $this->faker->paragraph,
        ];

        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('hack.submit'), $attributes)->assertRedirect('/');

        $this->assertDatabaseHas('hacks', $attributes);
        $this->get('/')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_hack_requires_a_title()
    {
        $user = User::factory()->create();

        $attributes = Hack::factory()->raw(['title' => '']);

        $this->actingAs($user)
            ->post(route('hack.submit'), $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_hack_has_a_valid_url()
    {
        $user = User::factory()->create();

        $attributes = Hack::factory()->raw(['url' => 'googledotcom']);

        $this->actingAs($user)
            ->post(route('hack.submit'), $attributes)->assertSessionHasErrors('url');
    }

    /** @test */
    public function a_hack_requires_a_text()
    {
        $user = User::factory()->create();

        $attributes = Hack::factory()->raw(['text' => '']);

        $this->actingAs($user)
            ->post(route('hack.submit'), $attributes)->assertSessionHasErrors('text');
    }

    /** @test */
    public function a_user_can_view_a_hack()
    {
        $this->withoutExceptionHandling();

        $hack = Hack::factory()->create();

        $this->get($hack->path())
            ->assertSee($hack->title);
    }

    /** @test */
    public function only_authenticated_users_can_submit_a_new_hack()
    {
        $attributes = Hack::factory()->raw();

        $this->post(route('hack.submit'), $attributes)->assertRedirect('login');
    }
}
