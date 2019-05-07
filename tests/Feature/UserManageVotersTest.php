<?php

namespace Tests\Feature;

use App\Voter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManageVotersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function guests_may_cannot_manage_voters()
    {
        $this->withExceptionHandling();
        $this->get('voters')->assertRedirect(route('login'));
        $this->get('voters/create')->assertRedirect(route('login'));
        $this->post('voters', [])->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function users_may_only_see_their_organization_voters()
    {
        $this->actingAs(factory('App\User')->create());
        $voter = factory('App\Voter')->create(['organization_id' => auth()->user()->organization->id]);
        $anotherOrganizationVoter = factory('App\Voter')->create();
        $this->get(route('voters.index'))
             ->assertSeeText($voter->name)
             ->assertDontSee($anotherOrganizationVoter->name);
    }

    /**
     * @test
     */
    public function an_organizations_voters_must_be_unique()
    {
        $this->actingAs(factory('App\User')->create());
        $voter = factory('App\Voter')->make(['organization_id' => auth()->user()->organization->id]);
        $anotherVoter = $voter->toArray();
        $voter->save();

        $this->post('voters', $anotherVoter)
             ->assertSessionHasErrors(['identity', 'email' ,'phone_number']);
        $this->assertCount(1, auth()->user()->organization->voters()->get());
    }

    /**
     * @test
     */
    public function an_organization_may_have_the_same_voter_identity_on_other_organizations()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());

        $sameIdentityVoter = factory('App\Voter')->make();
        $currentUserVoter = $sameIdentityVoter->toArray();
        $sameIdentityVoter->save();
        $currentUserVoter['organization_id'] = auth()->user()->organization->id;

        $this->post('voters', $currentUserVoter)->assertStatus(302);
        $this->assertCount(1, auth()->user()->organization->voters()->get());
        $this->assertCount(2, \App\Voter::get());
    }

    /**
     * @test
     */
    public function users_can_add_a_new_voter()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $this->get('voters')->assertStatus(200);

        $voter = factory('App\Voter')->make(['organization_id' => auth()->user()->organization->id])->toArray();

        $this->post('voters', $voter)->assertStatus(302);

        $firstVoter = auth()->user()->organization->voters()->first();
        $this->get(route('voters.show', $firstVoter->id))
             ->assertStatus(200)
             ->assertSeeText($firstVoter->name);

        $this->assertDatabaseHas('voters', $voter);
    }

    /**
     * @test
     */
    public function users_may_only_show_and_edit_their_organization_voters()
    {
        $this->actingAs(factory('App\User')->create());

        $anotherOrganizationVoter = factory('App\Voter')->create();
        $currentUserVoter = factory('App\Voter')->create(['organization_id' => auth()->user()->organization->id]);

        $this->get(route('voters.show', $anotherOrganizationVoter->id))
             ->assertStatus(403);

        $this->get(route('voters.show', $currentUserVoter->id))
             ->assertStatus(200)
             ->assertSeeText($currentUserVoter->name);
    }

    /**
     * @test
     */
    public function users_may_only_update_their_own_organization_voters()
    {
        $this->actingAs(factory('App\User')->create());

        $voter = factory('App\Voter')->create(['organization_id' => auth()->user()->organization->id])->toArray();
        $voter['name'] = 'Jane Doe';

        $anotherOrganizationVoter = factory('App\Voter')->create()->toArray();
        $anotherOrganizationVoter['name'] = 'John doe';

        $this->get(route('voters.edit', $anotherOrganizationVoter['id']))
             ->assertStatus(403);
        $this->patch(route('voters.update', $anotherOrganizationVoter['id']), $anotherOrganizationVoter)
             ->assertStatus(403);

        $this->get(route('voters.edit', $voter['id']))
             ->assertStatus(200);
        $this->patch(route('voters.update', $voter['id']), $voter)
             ->assertRedirect(route('voters.show', $voter['id']));

        $this->assertDatabaseHas('voters', $voter);
        $this->assertDatabaseMissing('voters', $anotherOrganizationVoter);

    }
}
