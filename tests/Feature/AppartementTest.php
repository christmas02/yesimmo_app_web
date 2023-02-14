<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Appartement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppartementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_save_appartement_pas_pas_un_agent_immobilier() 
    {

        $response = $this->post('appartement',[
            'titre' => 'la maison',
            'nom_residence' => 'la maison',
        ]);

        $response->assertOk();

        $this->assertCount(1, Appartement::all());

    }
}
