<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Album,Track};
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrackControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
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

    /**
     * @dataProvider invalidTracks
     */
    public function test_user_cannot_store_an_invalid_track($invalidData, $invalidFields)
    {
        $response = $this->post('/faixa/criar',$invalidData)
        ->assertSessionHasErrors($invalidFields)
        ->assertStatus(302);

        $this->assertDatabaseCount(Track::class, 0);
    }

    public function invalidTracks()
    {
        $album = Album::factory()->createOne();
        return [
            [
                ['name' => 'test track', 'duration' => '05:00','album_id' => $album->id],
                ['position']
            ],
            [
                ['position' => 1 , 'duration' => '05:00','album_id' => $album->id],
                ['name']
            ],
            [
                ['position' => 1, 'name' => 'test track', 'album_id' => $album->id],
                ['duration']
            ],
            [
                ['position' => 1, 'name' => 'test track', 'duration' => '05:00'],
                ['album_id']
            ],
        ];
    }
}
