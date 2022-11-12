<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\{Album,Track};
use Tests\TestCase;

class TrackControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_an_track()
    {
        $this->withoutExceptionHandling();
         //prepare
        $album = Album::factory()->create();
        // dd($track->album);
        //act
        $response = $this->post('/faixa/criar', [
            'position' => 1,
            'name' => 'test track',
            'duration' => '05:00',
            'album_id' => $album->id,
        ]);

        $track = Track::first();
        // dd($track);
        // assert
        $this->assertDatabaseHas(Track::class, [
            'position' => 1,
            'name' => 'test track',
            'duration' => '05:00',
            'album_id' => $album->id,
        ]);
        $this->assertEquals('test track', $track->name);
        $this->assertEquals(1, $track->position);
        $this->assertEquals('05:00', $track->duration);
        $this->assertEquals($track->album_id, $album->id);
        $this->assertInstanceOf(Album::class, $track->album);
        $response->assertStatus(302);
    }
}
