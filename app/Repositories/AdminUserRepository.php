<?php

namespace App\Repositories;

use App\Entities\AdminUser;

class AdminUserRepository
{
    public function all()
    {
        return AdminUser::all();
    }

    public function get($id)
    {
        return AdminUser::find($id);
    }

    public function delete($id)
    {
        return AdminUser::destroy($id);
    }

    public function save(AdminUser $adminUser)
    {
        $adminUser->save();
    }
}
