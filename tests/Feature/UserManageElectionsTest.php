<?php

namespace Tests\Feature;

use App\Election;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManageElectionsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     * Guest can't create an election
     * @return void
     */
    public function a_guest_cant_create_an_election()
    {
        $this->withExceptionHandling();

        $this->get(route('elections.index'))
             ->assertRedirect(route('login'));

        $this->get(route('elections.create'))
             ->assertRedirect(route('login'));

        $election = [];
        $this->post(route('elections.store'), $election)
             ->assertRedirect(route('login'));
        $this->assertDatabaseMissing('elections', $election);
    }

    /**
     * @test
     * @return void
     */
    public function create_election_button_must_be_found_on_elections_page()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->get(route('elections.index'))
             ->assertOk()
             ->assertSee(route('elections.create'));
    }

    /**
     * @test
     * @return void
     */
    public function create_election_form_cannot_be_blank()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->get(route('elections.create'))
             ->assertStatus(200);

        $election = [
            'name',
            'registration_opened_at',
            'registration_ends_at',
            'voting_starts_at',
            'voting_closed_at',
        ];

        $this->actingAs($user)
             ->post(route('elections.store'), [])
             ->assertSessionHasErrors($election);
    }

    /**
     * @test
     * User can create an elections
     *
     * @return void
     */
    public function an_user_can_create_an_election()
    {
        $this->withExceptionHandling();
        
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->get(route('elections.create'))
             ->assertStatus(200);

        $election = [
            'name' => $this->faker->name,
            'registration_opened_at' => $this->faker->dateTime(),
            'registration_ends_at' => $this->faker->dateTime(),
            'voting_starts_at' => $this->faker->dateTime(),
            'voting_closed_at' => $this->faker->dateTime(),
        ];

        $this->actingAs($user)
             ->post(route('elections.store'), $election)
             ->assertSessionHas('success')
             ->assertRedirect(route('elections.show', 1));

        $this->assertDatabaseHas('elections', $election);
    }
}
