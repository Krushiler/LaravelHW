<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ScheduledPost;
use App\Models\Post;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $dateTime = now();
            $scheduledPosts = ScheduledPost::where('is_completed', 0)->where('scheduled_at', '<=', $dateTime)->get();
            for ($i = 0; $i < count($scheduledPosts); $i++) {
                $scheduledPost = $scheduledPosts[$i];
                $post = Post::find($scheduledPost->post_id);
                $post->is_published = 1;
                $scheduledPost->is_completed = 1;
                $post->save();
                $scheduledPost->save();
            }
        })->everyMinute()->name('publish_scheduled_posts');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
