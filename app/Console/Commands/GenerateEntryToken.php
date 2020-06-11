<?php

namespace App\Console\Commands;

use App\Models\Attendee;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateEntryToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:generate-entry-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate unique random string for Attendees Entrance Token';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Attendee::chunk(10, function ($attendees) {
            foreach ($attendees as $attendee) {
                try {
                    $attendee->update(['entry_token' => Str::random(16)]);
                } catch (Exception $e) {
                    $attendee->update(['entry_token' => Str::random(16)]);
                }
            }
        });
    }
}
