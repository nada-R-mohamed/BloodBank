<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleAndPermisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermisionNames = [
            'governorates create','governorates view','governorates edit','governorates delete',
            'cities create','cities view','cities edit','cities delete',
            'categories create','categories view','categories edit','categories delete',
            'posts create','posts view','posts edit','posts delete',
            'clients view', 'clients status','clients delete',
            'contacts view','contacts delete',
            'donationRequests view','donationRequests delete',
            'users create','users view','users edit','users delete',
            'settings view','settings edit',
            'roles create','roles view','roles edit','roles delete',
        ];
        $permissions = collect($arrayOfPermisionNames)->map(function ($permission) {
                    return ['name'=>$permission,'guard_name'=>'web'];
        });
        Permission::insert( $permissions->toArray() );
        $role = Role::create(['name' => 'super admin'])->givePermissionTo($arrayOfPermisionNames);


    }
}
