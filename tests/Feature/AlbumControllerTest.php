<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\{Album,Track};
use PHPUnit\Framework\SkippedTest;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function test_user_can_see_albums()
    {
        Album::factory()->has(Track::factory(5))->create();
        $response = $this->get('/discografia');
        $response->assertViewHas('albums');
        $response->assertSessionDoesntHaveErrors();
        $response->assertStatus(200);
    }

    // public function test_user_can_search_album_by_name()
    // {

    //     //prepare
    //     $album = Album::factory(1)->has(Track::factory(1))->create()->toArray();

    //     //act
    //     $response = $this->post('/discografia', [$album[0]['name']]);

    //     //assert
    //     // $response->assertViewHas('albums');
    //     $response->assertStatus(302);
    // }

    public function test_user_can_create_an_album()
    {
        $this->withoutExceptionHandling();
         //prepare
        $album = Album::factory()->make()->toArray();

        //act
        $response = $this->post('/discografia/criar', $album);


        // assert
        $this->assertDatabaseHas(Album::class, $album);
        $this->assertEquals($album['name'], $album['name']);
        $this->assertEquals($album['release_date'], $album['release_date']);
        $response->assertStatus(302);
    }


}
