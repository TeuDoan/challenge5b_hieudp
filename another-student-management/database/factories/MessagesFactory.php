<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // Adjust based on your User model location

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Messages>
 */
class MessagesFactory extends Factory
{
    public function definition(): array
    {
        $userUuids = User::pluck('uuid')->toArray(); // Get all UUIDs from users table
        $sender_uuid = fake()->randomElement($userUuids);
        $available_recipients = array_filter($userUuids, fn($uuid) => $uuid !== $sender_uuid);

        return [
            'message' => fake()->realText(100),
            'sender_uuid' => $sender_uuid,
            'recipient_uuid' => fake()->randomElement($available_recipients),
        ];
    }
}