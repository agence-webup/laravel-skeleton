<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AdminUserRepository;

class AdminUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:update {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update an admin user';


    /**
     * @var App\Repositories\AdminUserRepository
     */
    protected $adminRepo;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AdminUserRepository $adminRepo)
    {
        parent::__construct();

        $this->adminRepo = $adminRepo;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment("Update an admin user");

        $admin = $this->adminRepo->get($this->argument('id'));
        if (!$admin) {
            $this->comment("Admin user not found.");
            return;
        }

        $admin->email = $this->ask('email', $user->email);
        $password = $this->ask('password', false);
        if ($password) {
            $admin->password = bcrypt($password);
        }

        $this->adminRepo->save($admin);

        $this->comment("Admin user updated");
    }
}
