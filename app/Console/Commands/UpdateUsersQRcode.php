<?php

namespace App\Console\Commands;

use App\Models\QRcode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Jobs\UpdateUsersQRcodeJob;

class UpdateUsersQRcode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users-qrcode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates QR code for every user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Handle logic to know if there are users that need to get the qrCode updated
        //The condition is that updated_at is smaller than today's date
        $today = Carbon::today();
        $secretValue = QRcode::generateSecretValue();
        $chunkSize = 100;
        User::whereDate('updated_at', '<', $today)->chunk($chunkSize, function ($users) use ($secretValue) {
            $this->info('Starting QR code update task for a batch of users...');
            UpdateUsersQRcodeJob::dispatch($users,$secretValue)->delay(now()->addSeconds(10));
            $this->info('QR code update task dispatched for a batch of users.');
        });


//        $users = User::whereDate('updated_at', '<', $today)->take(100)->get();
//        if ($users->count() > 0){
//
//        }


        $this->info("All users QRcodes updated successfully");
    }
}
