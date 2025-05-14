<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add ALL PERMISSIONS to Admin Role
		$role = Role::findByName('Admin');
		$permissions = Permission::pluck('id','id')->all();       
        $role->syncPermissions($permissions);
		
		// Add appropriate permissions to Manager role
		$role = Role::findByName('Manager');
		$role->givePermissionTo(['profile-list',
									'profile-edit',
									'profile-delete',
									'user-list',
									'user-create',
									'user-edit',
									'event-list',
									'event-create',
									'event-edit',
									'event-delete',
									'client-list',
									'client-create',
									'client-edit',
									'client-delete',
									'document-list',
									'document-create',
									'document-edit',
									'document-delete',
									'tsak-list',
									'tsak-create',
									'tsak-edit',
									'task-delete',
									'project-list',
									'project-create',
									'project-edit',
									'project-delete',
									'myprofile-list',
									'myprofile-edit',
									'mtprofile-delete',
									'myprofile-create',]);
									
		// Add appropriate permissions to Brother role
		$role = Role::findByName('Brother');
		$role->givePermissionTo(['myprofile-list',
									'myprofile-edit',
									'myprofile-delete',
									'myprofile-create',
									'document-list',
									'project-list',
									'tsak-list',
									'document-list',
									'client-list',
									'event-list',
									'profile-list',]);
		
    }
}