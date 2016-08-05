<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AdminUserRepository;

class AdminDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete an admin user';

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
        $this->comment("Delete an admin user.");

        if ($this->confirm('Are you sure to delete this user? [y|N]')) {
            $admin = $this->adminRepo->get($this->argument('id'));
            if (!$admin) {
                $this->comment("Admin user not found.");
                return;
            }
            $this->adminRepo->delete($admin->id);
            $this->comment("Admin user deleted.");
        }
    }
}
