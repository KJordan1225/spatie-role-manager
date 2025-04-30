<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
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

        $userProfile = UserProfile::create([
            'user_id' => $user->id,
            'first_name' => 'Keith',
            'last_name' => 'Jordan',
            'address1' => '2216 Sherman Dr NW',
            'city' => 'Roanoke',
            'state' => 'Virginia',
            'zip_code' => '24017',
            'phone_number' => '540-521-8487',
            'dob' => '1969-10-16',
            'queversary' =>'1990-03-18',            
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
         
        $permissions = Permission::whereBetween('id', [5, 16])->pluck('id', 'id');
       
        $role->syncPermissions($permissions);
         
        $manager->assignRole([$role->id]);

        $brother = User::create([
            'name' => 'User2 Brother', 
            'email' => 'user2@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);
        
        $role1 = Role::create(['name' => 'Brother']);
         
        $permission1 = Permission::create(['name' => 'show-my-profile']);       
        $role1->givePermissionTo($permission1);
        $permission2 = Permission::create(['name' => 'create-my-profile']);       
        $role1->givePermissionTo($permission2);
        $permission3 = Permission::create(['name' => 'edit-my-profile']);       
        $role1->givePermissionTo($permission3);
        $permission4 = Permission::create(['name' => 'event-list']);       
        $role1->givePermissionTo($permission4);
         
        $brother->assignRole([$role1->id]);

        $brother = User::create([
            'name' => 'User3 Brother', 
            'email' => 'user3@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);

        $brother->assignRole([$role1->id]);

        $brother = User::create([
            'name' => 'User4 Brother', 
            'email' => 'user4@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);

        $brother->assignRole([$role1->id]);

        $brother = User::create([
            'name' => 'User5 Brother', 
            'email' => 'user5@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);

        $brother->assignRole([$role1->id]);

        $brother = User::create([
            'name' => 'User6 Brother', 
            'email' => 'user6@gmail.com',
            'password' => bcrypt('Welc0me!')
        ]);

        $brother->assignRole([$role1->id]);
        
    }
}
