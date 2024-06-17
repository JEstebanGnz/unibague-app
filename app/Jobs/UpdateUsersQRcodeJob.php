<?php

namespace App\Jobs;

use App\Models\QRcode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUsersQRcodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Collection $users;
    public int $secretValue;

    /**
     * Create a new job instance.
     */
    public function __construct($users, $secretValue)
    {
        $this->users = $users;
        $this->secretValue = $secretValue;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        QRcode::updateUsersQRcode($this->users, $this->secretValue);
    }
}
