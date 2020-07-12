<?php

use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Employee',
            'slug' => 'employee',
        ]);

        factory(App\About::class)->create();
        factory(App\Customer::class, 10)->create();
        factory(App\Gift::class, 20)->create();
        factory(App\Inventorie::class, 100)->create();
        factory(App\User::class, 10)->create();
    }
}
