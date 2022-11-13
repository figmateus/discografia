<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Album,Track};
use Tests\TestCase;

class TrackControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_an_track()
    {
        $this->withoutExceptionHandling();
         //prepare
        $album = Album::factory()->create();
        //act
        $response = $this->post('/faixa/criar', [
            'position' => 1,
            'name' => 'test track',
            'duration' => '05:00',
            'album_id' => $album->id,
        ]);

        $track = Track::first();
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

    public function test_user_cannot_store_an_invalid_track_missing_position()
    {
        $album = Album::factory()->create();
        $response = $this->post('/faixa/criar',[
            'name' => 'test track',
            'duration' => '05:00',
            'album_id' => $album->id
        ])
        ->assertSessionHasErrors('position')
        ->assertStatus(302);

        $this->assertDatabaseCount(Track::class, 0);
    }

    public function test_user_cannot_store_an_invalid_track_missing_name()
    {
        $album = Album::factory()->create();
        $response = $this->post('/faixa/criar',[
            'position' => 1,
            'duration' => '05:00',
            'album_id' => $album->id
        ])
        ->assertSessionHasErrors('name')
        ->assertStatus(302);

        $this->assertDatabaseCount(Track::class, 0);
    }

    public function test_user_cannot_store_an_invalid_track_missing_duration()
    {
        $album = Album::factory()->create();
        $response = $this->post('/faixa/criar',[
            'position' => 1,
            'name' => 'track name',
            'album_id' => $album->id
        ])
        ->assertSessionHasErrors('duration')
        ->assertStatus(302);

        $this->assertDatabaseCount(Track::class, 0);
    }

    public function test_user_cannot_store_an_invalid_track_missing_album()
    {
        $album = Album::factory()->create();
        $response = $this->post('/faixa/criar',[
            'position' => 1,
            'name' => 'track name',
            'duration' => '05:00',
        ])
        ->assertSessionHasErrors('album_id')
        ->assertStatus(302);

        $this->assertDatabaseCount(Track::class, 0);
    }

    public function test_user_can_delete_a_track()
    {
        $album = Album::factory()->has(Track::factory(5))->create();
        $response = $this->get('/faixa/apagar/'.$album->tracks[0]->id);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing(Track::class,[
            'position' => $album->tracks[0]->position,
            'name' => $album->tracks[0]->name,
            'duration' => $album->tracks[0]->duration,
            'album_id' => $album->tracks[0]->album_id
        ]);
        $response->assertStatus(302);
    }
}
