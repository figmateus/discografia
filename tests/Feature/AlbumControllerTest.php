<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\{Album,Track};
use Carbon\Carbon;
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
        $album = Album::factory()->has(Track::factory(5))->create();
        $response = $this->get('/discografia');
        $response->assertViewHas('albums');
        $response->assertSessionDoesntHaveErrors();
        $response->assertSee($album->name);
        $response->assertStatus(200);
    }

    public function test_user_can_search_album_by_name()
    {
        //prepare
        $album = Album::factory()->has(Track::factory(1))->create();
        //act
        $response = $this->get('/discografia/search', [
            'search' => $album->name
        ]);

        //assert
        $response->assertSee($album->name);
        $response->assertSee($album->release_date->format('Y'));
        $response->assertSee($album->tracks[0]->name);
        $response->assertSee($album->tracks[0]->duration);
        $response->assertSessionDoesntHaveErrors();
        $response->assertViewHas('albums');
        $response->assertStatus(200);
    }

    public function test_user_see_an_message_if_search_album_by_name_dont_find_an_album()
    {
        //act
        $response = $this->get('/discografia/search', [
            'search' => 'test album name'
        ]);

        //assert
        $response->assertSee('Album não encontrado');
        $response->assertDontSee('test album name');
        $response->assertStatus(200);
    }

    public function test_user_can_create_an_album()
    {
        $this->withoutExceptionHandling();
         //prepare
        $album = Album::factory()->make();
        // dd($album);
        //act
        $response = $this->post('/discografia/criar',[
            'name' => $album->name,
            'release_date' => $album->release_date,
        ]);

        $albumAfterPost = Album::first();

        // assert
        $this->assertDatabaseHas(Album::class,[
            'name' => $album->name,
            'release_date' => $album->release_date,
        ]);
        $this->assertEquals($albumAfterPost->name, $album['name']);
        $this->assertEquals($albumAfterPost->release_date->format('Y-m-d'), $album->release_date->format('Y-m-d'));
        $response->assertStatus(302);
    }

    /**
     * @dataProvider invalidAlbums
     */
    public function test_user_cannot_store_an_invalid_album($invalidData, $invalidFields)
    {
        $response = $this->post('/discografia/criar',$invalidData)
        ->assertSessionHasErrors($invalidFields)
        ->assertStatus(302);

        $this->assertDatabaseCount(Album::class, 0);
    }

    public function invalidAlbums()
    {
        return [
            [
                ['name' => 'Valid Album'],
                ['release_date']
            ],
            [
                ['release_date' => Carbon::create(2006,01,01)],
                ['name']
            ]
        ];
    }

    public function test_user_can_delete_album()
    {
         //prepare
         $album = Album::factory()->has(Track::factory())->create();
         //act
         $response = $this->get('/discografia/apagar/'. $album->id);

         //assert
         $this->assertDatabaseMissing(Album::class,[
            'name' => $album->name,
            'release_date' => $album->release_date,
         ]);

         $response->assertStatus(302);
    }


}
