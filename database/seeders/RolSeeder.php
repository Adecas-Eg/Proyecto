<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $role1= Role::create(['name'=> 'admin']);
         $role2 = Role::create(['name'=> 'client']);


         Permission::create(['name' => 'dashboard'])->assignRole($role1);

         Permission::create(['name' => 'users.index'])->syncRoles($role1);;
         Permission::create(['name' => 'users.edit'])->syncRoles($role1);;
         Permission::create(['name' => 'users.update'])->syncRoles($role1);
         
         Permission::create(['name' => 'casa.create'])->syncRoles([$role1,$role2]);;
         Permission::create(['name' => 'casa.store'])->syncRoles([$role1,$role2]);;
         Permission::create(['name' => 'casa.show']);
         Permission::create(['name' => 'casa.administer'])->syncRoles([$role1,$role2]);;
         Permission::create(['name' => 'casa.edit'])->syncRoles([$role1,$role2]);;
         Permission::create(['name' => 'casa.update'])->syncRoles([$role1,$role2]);;

         Permission::create(['name' => 'virtual-reality']);
         Permission::create(['name' => 'rtl'])->assignRole($role1);;
         Permission::create(['name' => 'profile'])->assignRole([$role1,$role2]);;
         Permission::create(['name' => 'profile-static'])->assignRole($role1);;
         Permission::create(['name' => 'sign-in-static'])->assignRole($role1);;
         Permission::create(['name' => 'sign-up-static'])->assignRole($role1);;
         Permission::create(['name' => 'page'])->assignRole($role1);;   
         
    }
}
