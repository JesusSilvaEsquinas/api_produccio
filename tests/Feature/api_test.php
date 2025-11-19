<?php

namespace Tests\Feature;

use App\Models\Games;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_games_index_returns_successful_response()
    {
        $this->get('/games')->assertStatus(200);
    }

    public function test_we_can_create_a_game()
    {
        $data = [
            'title' => 'Provar API',
            'developer' => 'Dev Test',
            'year' => 2024,
            'description' => 'Prova de creació de joc',
        ];

        $response = $this->post('/games', $data);

        $response->assertStatus(200)
                 ->assertJson(['created' => true]);

        $this->assertDatabaseHas('games', $data);
    }

    public function test_we_can_show_a_game()
    {
        $game = Games::create([
            'title' => 'Joc existent',
            'developer' => 'Dev',
            'year' => 2023,
            'description' => 'Joc per mostrar',
        ]);

        $this->get("/games/{$game->id}")
             ->assertStatus(200)
             ->assertJsonFragment([
                 'id' => $game->id,
                 'title' => 'Joc existent',
             ]);
    }

    public function test_we_can_update_a_game()
    {
        $game = Games::create([
            'title' => 'Antic títol',
            'developer' => 'Dev',
            'year' => 2022,
            'description' => 'Desc',
        ]);

        $updateData = [
            'title' => 'Títol actualitzat',
            'developer' => 'Dev',
            'year' => 2022,
            'description' => 'Desc',
        ];

        $this->put("/games/{$game->id}", $updateData)
             ->assertStatus(200)
             ->assertJson(['updated' => true]);

        $this->assertDatabaseHas('games', array_merge(['id' => $game->id], $updateData));
    }

    public function test_we_can_delete_a_game()
    {
        $game = Games::create([
            'title' => 'Per esborrar',
            'developer' => 'Dev',
            'year' => 2021,
            'description' => 'Desc',
        ]);

        $this->delete("/games/{$game->id}")
             ->assertStatus(200)
             ->assertJson(['destroyed' => true]);

        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }

    public function test_ci_block_deploy_when_tests_fail()
    {
        // Test intencionadament fallit per comprovar que el workflow de CI
        // marca l'execució com a fallida i no es fa el deploy.
        $this->assertTrue(false);
    }
}