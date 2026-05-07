<?php

namespace Tests\Feature;

use App\Models\Gradient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradientTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_gradient(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('gradients.store'), [
            'name' => 'Test Gradient',
            'colour_start' => '#ff0000',
            'colour_end' => '#0000ff',
            'angle' => 90,
        ]);

        $this->assertDatabaseHas('gradients', [
            'name' => 'Test Gradient',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_only_sees_their_own_gradients(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Gradient::factory()->create([
            'user_id' => $user->id,
            'name' => 'My Gradient',
        ]);

        Gradient::factory()->create([
            'user_id' => $otherUser->id,
            'name' => 'Other Gradient',
        ]);

        $response = $this->actingAs($user)->get(route('gradients.index'));

        $response->assertSee('My Gradient');
        $response->assertDontSee('Other Gradient');
    }

    public function test_user_cannot_view_another_users_gradient(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $gradient = Gradient::factory()->create([
            'user_id' => $otherUser->id,
        ]);

        $this->actingAs($user)
            ->get(route('gradients.show', $gradient))
            ->assertForbidden();
    }
}