<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Article;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Support Panel',
            'email' => 'demo@database.krd',
            'password' => bcrypt('demo@database.krd'),
        ]);
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        // get model has roles table
        $user->assignRole($role);

        $permission = Permission::create(
            [
                'name' => 'roles',
                'guard_name' => 'web',
            ]
        );
        $role->givePermissionTo($permission);

        $permission = Permission::create(
            [
                'name' => 'users',
                'guard_name' => 'web',
            ]
        );
        $role->givePermissionTo($permission);

        $permission = Permission::create(
            [
                'name' => 'article',
                'guard_name' => 'web',
            ]
        );
        $role->givePermissionTo($permission);

        // create 100 article
        for ($i = 0; $i < 100; $i++) {
            Article::create([
                'title' => 'Article ' . $i,
                'slug' => 'article-' . $i,
                'view_count' => rand(1, 1000),
                'content' => 'Content ' . $i,
                'language_id' => 1,
            ]);
        } 
    }
}
