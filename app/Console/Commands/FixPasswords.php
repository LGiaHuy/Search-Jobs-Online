<?php
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class FixPasswords extends Command
{
    protected $signature = 'fix:passwords';

    protected $description = 'Fix passwords that are not hashed with bcrypt';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $user->password = bcrypt($user->password);
                $user->save();
            }
        }

        $this->info('Passwords have been fixed successfully.');
    }
}
