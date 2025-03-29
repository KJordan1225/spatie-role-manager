<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Shadow Admin', 
            'email' => 'shadow902@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);
        
        $role = Role::create(['name' => 'Admin']);
         
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);

        $manager = User::create([
            'name' => 'User1 Manager', 
            'email' => 'user1@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);
        
        $role = Role::create(['name' => 'Manager']);
         
        $permissions = Permission::whereBetween('id', [5, 12])->pluck('id', 'id');
       
        $role->syncPermissions($permissions);
         
        $manager->assignRole([$role->id]);

        $brother = User::create([
            'name' => 'User2 Brother', 
            'email' => 'user2@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);
        
        $role = Role::create(['name' => 'Brother']);
         
        $permission = Permission::create(['name' => 'show-my-profile']);       
        $role->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'create-my-profile']);       
        $role->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-my-profile']);       
        $role->givePermissionTo($permission);
         
        $brother->assignRole([$role->id]);
    }
}
