<?php

namespace App\Console\Commands;

use App\Models\QRcode;
use Illuminate\Console\Command;

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
        $this->info('Starting QR code update task...');
        QRcode::updateUsersQRcode();
        $this->info('QR code update task completed.');
    }
}
