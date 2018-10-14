<?php

namespace Tests\Feature;

use App\User;
use App\Clients;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userCanAddAClient()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->json('POST', route('clients.store'), [
                'name' => 'Client Name',
                'email' => 'client@app.com',
                'cin' => '123456',
                'phone' => '1234567891',
                'address' => '123 Main st',
                'city' => 'Los Angeles',
                'status' => 1,
            ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Name'
        ]);
    }

    /** @test */
    public function userCanUpdateAClient()
    {
        $user = factory(User::class)->create();
        $client = factory(Clients::class)->create(['status' => 1]);

        $this->actingAs($user)
            ->json('PATCH', route('clients.update', $client->id), [
                'name' => 'New Client Name',
                'email' => 'client@app.com',
                'cin' => '123456',
                'phone' => '1234567891',
                'address' => '123 Main st',
                'city' => 'Los Angeles',
            ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'New Client Name',
            'status' => 1,
        ]);
    }

    /** @test */
    public function userCanDestroyAClient()
    {
        $user = factory(User::class)->create();
        $client = factory(Clients::class)->create(['name' => 'Client Name']);

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Name',
        ]);

        $this->actingAs($user)
            ->json('DELETE', route('clients.destroy', $client->id));

        $this->assertDatabaseMissing('clients', [
            'name' => 'Client Name',
        ]);
    }

    /** @test */
    public function guestCantAddAClient()
    {
        $this->json('POST', route('clients.store'), [
            'name' => 'Client Name',
            'email' => 'client@app.com',
            'cin' => '123456',
            'phone' => '1234567891',
            'address' => '123 Main st',
            'city' => 'Los Angeles',
            'status' => 1,
        ]);

        $this->assertDatabaseMissing('clients', [
            'name' => 'Client Name'
        ]);
    }

    /** @test */
    public function guestCantUpdateAClient()
    {
        $client = factory(Clients::class)->create(['name' => 'Client Name', 'status' => 1]);

        $this->json('PATCH', route('clients.update', $client->id), [
            'name' => 'New Client Name',
            'email' => 'client@app.com',
            'cin' => '123456',
            'phone' => '1234567891',
            'address' => '123 Main st',
            'city' => 'Los Angeles',
        ]);

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Name',
            'status' => 1,
        ]);
    }

    /** @test */
    public function guestCantDestroyAClient()
    {
        $client = factory(Clients::class)->create(['name' => 'Client Name']);

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Name',
        ]);

        $this->json('DELETE', route('clients.destroy', $client->id));

        $this->assertDatabaseHas('clients', [
            'name' => 'Client Name',
        ]);
    }
}
