<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AdminUserRepository;
use App\Entities\AdminUser;

class AdminCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

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
        $this->comment("Create an admin user");

        $email = $this->ask('email');
        $password = $this->ask('password');

        $admin = new AdminUser();
        $admin->email = $email;
        $admin->password = bcrypt($password);

        $this->adminRepo->save($admin);

        $this->comment("Admin user created");
    }
}
