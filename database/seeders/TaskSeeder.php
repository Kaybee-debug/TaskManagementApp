<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users or create a test user
        $users = User::all();
        
        if ($users->isEmpty()) {
            $users = collect([User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ])]);
        }

        // Create tasks for each user
        foreach ($users as $user) {
            Task::create([
                'user_id' => $user->id,
                'title' => 'Complete Laravel Assessment',
                'description' => 'Build a task management application with authentication and CRUD operations.',
                'status' => 'in_progress',
                'due_date' => now()->addDays(7),
            ]);

            Task::create([
                'user_id' => $user->id,
                'title' => 'Review Code',
                'description' => 'Review the codebase and ensure all requirements are met.',
                'status' => 'pending',
                'due_date' => now()->addDays(3),
            ]);

            Task::create([
                'user_id' => $user->id,
                'title' => 'Write Documentation',
                'description' => 'Create comprehensive README with deployment instructions.',
                'status' => 'pending',
                'due_date' => now()->addDays(5),
            ]);

            Task::create([
                'user_id' => $user->id,
                'title' => 'Test Application',
                'description' => 'Test all CRUD operations and authentication flows.',
                'status' => 'completed',
                'due_date' => now()->subDays(1),
            ]);
        }
    }
}
