<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserRepoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_user(): void
    {
        $userRepository = resolve(UserRepository::class);
        $user = $userRepository->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->assertInstanceOf(\App\Models\User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe@example.com', $user->email);
    }

    public function test_create_user_service()
    {
        $userService = resolve(UserService::class);
        $user = $userService->registerUser([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertInstanceOf(\App\Models\User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe@example.com', $user->email);
        $this->assertNotEquals('password123', $user->password);
    }

}
