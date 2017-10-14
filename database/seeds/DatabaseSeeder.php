<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Profile;
use App\Task;
use App\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Ask for confirmation to refresh migration
        if($this->command->confirm('Do you wish to refresh migration before seeding?')) {
            app()['cache']->forget('spatie.permission.cache');
            $this->command->call('migrate:refresh');
            $this->command->warn("Data deleted, starting from fresh database.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $this->command->info('Default Permissions added.');

        // Ask to confirm to assign admin or user Role
        if($this->command->confirm('Create Roles for user, default is admin and user? [y|n]')) {

            // Ask for roles from input
            $roles = $this->command->ask('Enter roles in comma seperated format.', 'Admin,User');

            $rolesArray = explode(',', $roles);

            foreach($rolesArray as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if($role->name == 'super-admin') {
                    // Assign all permissions to admin role
                    $role->permissions()->sync(Permission::all());
                    $this->command->info('super-admin will have full rights');
                } else {
                    // for others, give access to view only
                    $role->permissions()->sync(Permission::where('name', 'LIKE', 'view_%')->get());
                }

                // Create 4 users for every role
                for($i = 0; $i < 4; $i++) {
                    if($role->name == 'client') {
                        $this->createClient();
                    } else {
                        $this->createUser($role);
                    }
                }

            }

            $this->command->info('Roles ' . $roles . ' added successfully');

        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('By default, User role added.');
        }

        // Load four companies for testing
        for($i = 0; $i < 4; $i++) {
            $company = factory(Company::class)->create();
        }

    }

    /**
     * Create a user with a given Role
     *
     * @param $role
     */

    private function createUser($role) {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);

        if($role->name == 'super-admin') {
            $this->command->info('Admin login details:');
            $this->command->warn('Username: ' . $user->email);
            $this->command->warn('Password: "secret"');
        }
    }

    private function createClient() {
        $client = factory(Client::class)->create();
        $client->assignRole('client');

    }
}
