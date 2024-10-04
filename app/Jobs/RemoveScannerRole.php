<?php

namespace App\Jobs;

use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemoveScannerRole implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;

    /**
     * Create a new job instance.
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $functionaryRole = Role::getRoleIdByName('funcionario');
        foreach ($this->event->administrators as $admin) {
            \DB::table('users')->where('id', $admin->id)->update(['role_id' => $functionaryRole]);
        }
    }
}
