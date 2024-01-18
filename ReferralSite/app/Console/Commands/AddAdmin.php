<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-admin {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to add  an admin user and set his credentials in the application ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User;
        $user->name = "Admin";
        $user->email = $this->argument('email');
        $user->password = Hash::make($this->argument('password'));
        $user->is_admin = 1;
        $user->save();
        $this->info("Admin user created with username {$this->argument('email')} and password {$this->argument('password')}");
    }
}
