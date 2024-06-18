<?php

namespace App\Console\Commands;

use App\Models\QRcode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Jobs\UpdateUsersQRcodeJob;
use Illuminate\Support\Facades\DB;

class UpdateUsersQRcodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users_qrcode:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates QR code for every user';


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
     */
    public function handle()
    {
        //Handle logic to know if there are users that need to get the qrCode updated
        //The condition is that updated_at is smaller than today's date
        $today = Carbon::today();
        $secretValue = QRcode::generateSecretValue();
        DB::table('users')->whereDate('updated_at','<', $today)
            ->chunkById(100, function ($users) use($secretValue){
                $this->info('Starting QR code update task for a batch of users...');
                UpdateUsersQRcodeJob::dispatch($users, $secretValue)->delay(now()->addSeconds(20));
                $this->info('QR code update task dispatched for a batch of users.');
        });
        $this->info("All users QRcodes updated successfully");

        /*
        $chunkSize = 100;
        $counter = 1;
        User::whereDate('updated_at', '<', $today)->chunk($chunkSize, function ($users) use ($secretValue, &$counter) {
            // Dispatch the job for this chunk of users
            foreach ($users as $user) {

            }

            $counter++;
        });*/
    }
}
