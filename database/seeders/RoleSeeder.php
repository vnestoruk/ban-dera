<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private array $_ROLES = [
        'admin',
        'moderator',
        'member'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_ROLES as $ROLE) {
            Role::create(['name' => $ROLE]);
        }
        $this->command->info(count($this->_ROLES) . ' roles added.');
    }
}
