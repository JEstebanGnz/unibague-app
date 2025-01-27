<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class HandleScanRoleAssignmentOnEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:scan-role-assignment';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign or remove scanner role based on event start and end dates';
    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Assign the scanner role when event starts
        $scanRoleId = Role::getRoleIdByName('scan');
        $adminRoleId = Role::getRoleIdByName('admin');
        $eventsStarting = Event::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>', Carbon::now())
            ->get();

        foreach ($eventsStarting as $event) {
            foreach ($event->administrators as $user) {
                if ($user->role_id !== $scanRoleId && $user->role_id !== $adminRoleId) {
                    \DB::table('users')->where('id', $user->id)->update(['role_id' => $scanRoleId]);
                }
            }
        }

        // Remove the scanner and assign the functionary role when event ends
        $functionaryRoleId = Role::getRoleIdByName('funcionario');
        $eventsEnding = Event::where('end_date', '<=', Carbon::now())->get();

        foreach ($eventsEnding as $event) {
            foreach ($event->administrators as $user) {
                if ($user->role_id !== $functionaryRoleId && $user->role_id !== $adminRoleId) {
                    \DB::table('users')->where('id', $user->id)->update(['role_id' => $functionaryRoleId]);
                }
            }
        }
    }
}
