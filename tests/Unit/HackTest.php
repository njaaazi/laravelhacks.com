<?php

namespace Tests\Unit;

use App\Models\Hack;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HackTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $hack = Hack::factory()->create();
        $this->assertSame($hack->path(), 'hacks/' . $hack->id);
    }
}
