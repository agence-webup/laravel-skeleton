<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\AdminUserRepository;

class AdminList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all admin users';

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
        $this->comment("List all admin users");

        $admins = $this->adminRepo->all();

        $headers = ['id', 'email'];
        $rows = [];
        foreach ($admins as $admin) {
            $rows[] = [
                $admin->id,
                $admin->email,
            ];
        }

        $this->table($headers, $rows);
    }
}
