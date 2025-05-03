<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'opengrc:create-user')]
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opengrc:create-user {email? : The email of the user} {password? : The password of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        User::create([
            'email' => $email,
            'name' => $email,
            'password' => Hash::make($password),
            'password_reset_required' => false,
        ]);

        $this->components->info('User Created.');
    }
}
