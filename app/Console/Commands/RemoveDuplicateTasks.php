<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveDuplicateTasks extends Command
{
    protected $signature = 'tasks:remove-duplicates';
    protected $description = 'Remove duplicate tasks from the database';

    public function handle()
    {
        $this->info('Removing duplicate tasks...');

        // Get all tasks grouped by user_id, title, description, status, and due_date
        $duplicates = Task::select('user_id', 'title', 'description', 'status', 'due_date')
            ->groupBy('user_id', 'title', 'description', 'status', 'due_date')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        $deletedCount = 0;

        foreach ($duplicates as $duplicate) {
            // Get all tasks matching this duplicate criteria
            $tasks = Task::where('user_id', $duplicate->user_id)
                ->where('title', $duplicate->title)
                ->where('description', $duplicate->description)
                ->where('status', $duplicate->status)
                ->where('due_date', $duplicate->due_date)
                ->orderBy('id')
                ->get();

            // Keep the first one, delete the rest
            if ($tasks->count() > 1) {
                $tasks->skip(1)->each(function ($task) use (&$deletedCount) {
                    $task->delete();
                    $deletedCount++;
                });
            }
        }

        $this->info("Removed {$deletedCount} duplicate tasks.");
        return 0;
    }
}
