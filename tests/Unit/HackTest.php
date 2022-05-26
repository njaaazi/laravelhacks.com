<?php

namespace Tests\Unit;

use App\Models\Hack;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HackTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $hack = Hack::factory()->create();
        $this->assertSame($hack->path(), 'hacks/' . $hack->slug);
    }

    /** @test */
    public function it_has_a_slug()
    {
        $hack = Hack::factory()->create([
              'title' => 'My first hack',
          ]);

        $this->assertSame($hack->slug, 'my-first-hack');
    }

    /** @test */
    public function a_hack_belongs_to_a_user()
    {
        $hack = Hack::factory()->create();

        $this->assertInstanceOf(User::class, $hack->user);
    }

    /** @test */
    public function a_hack_has_many_comments()
    {
        $hack = Hack::factory()
              ->hasComments(3)
              ->create();

        $this->assertInstanceOf(Collection::class, $hack->comments);
    }
}
