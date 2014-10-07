<?php

use \User;
use \Group;
use \Menu;
use \Permission;

class AuthenticationAuthorizationSeeder extends Seeder {

    /**
     * Seed untuk migrasi database AuthenticationAuthorization.
     *
     * @return void
     */
    public function run()
    {
        DB::connection()->disableQueryLog();

        $faker = Faker\Factory::create();

        $dosenGroup = Group::create(array(
            'name' => 'dosen',
            'level' => 2,
            'enabled' => 1,
        ));
        
        $mahasiswaGroup = Group::create(array(
            'name' => 'mahasiswa',
            'level' => 1,
            'enabled' => 1,
        ));

        $adminGroup = Group::create(array(
            'name' => 'admin',
            'level' => 3,
            'enabled' => 1,
        ));

        $dosen = array();
        for ($i = 1; $i <= 10; $i++)
        {
            $username = 'dosen' . $i;
            $rand = rand(0,1);
            array_push($dosen, User::create(array(
                'username' => $username,
                'password' => 'coba',
                'email' => $username . '@dosen.kampus.ac.id',
                'name' => $rand == 1 ? $faker->name('male') : $faker->name('female'),
                'currentaddress' => $faker->address,
                'originaddress' => $faker->address,
                'contact' => $faker->phoneNumber,
                'gender' => rand(0,1) == 0 ? 'l' : 'p',
                'last_logtime' => $faker->dateTime(),
                'last_ip' => $faker->ipv4,
                'enabled' => $faker->boolean(60),
            )));

            $dosen[$i-1]->group()->attach($dosenGroup);
        }

        $mahasiswa = array();
        for ($i = 1; $i <= 200; $i++)
        {
            $username = 'mahasiswa' . $i;
            $rand = rand(0,1);
            array_push($mahasiswa, User::create(array(
                'username' => $username,
                'password' => 'coba',
                'email' => $username . '@mahasiswa.kampus.ac.id',
                'name' => $rand == 1 ? $faker->name('male') : $faker->name('female'),
                'birthplace' => $faker->city,
                'bloodtype' => $faker->randomElement(['A', 'AB', 'B', 'O']),
                'homepage' => $faker->domainName,
                'postalcode' => $faker->postcode,
                'currentaddress' => $faker->address,
                'originaddress' => $faker->address,
                'contact' => $faker->phoneNumber,
                'gender' => rand(0,1) == 0 ? 'l' : 'p',
                'last_logtime' => $faker->dateTime(),
                'last_ip' => $faker->ipv4,
                'enabled' => $faker->boolean(60),
            )));

            $mahasiswa[$i-1]->group()->attach($mahasiswaGroup);
        }

        $admin = array();
        for ($i = 1; $i <= 10; $i++)
        {
            $username = 'admin' . $i;
            $rand = rand(0,1);
            array_push($admin, User::create(array(
                'username' => $username,
                'password' => 'coba',
                'email' => $username . '@kampus.ac.id',
                'name' => $rand == 1 ? $faker->name('male') : $faker->name('female'),
                'currentaddress' => $faker->address,
                'originaddress' => $faker->address,
                'contact' => $faker->phoneNumber,
                'gender' => rand(0,1) == 0 ? 'l' : 'p',
                'last_logtime' => $faker->dateTime(),
                'last_ip' => $faker->ipv4,
                'enabled' => $faker->boolean(60),
            )));

            $admin[$i-1]->group()->attach($adminGroup);
            $admin[$i-1]->group()->attach($dosenGroup);
            $admin[$i-1]->group()->attach($mahasiswaGroup);
        }

        $route = array(
            'user',
            'user/detail',
            'user/detail/{id}',
            'user/update',
            'user/update/{id}',
            'user/delete/{id}',
            'user/create',
            'user/manage',
            'user/change_password/{id}',
            'user/change_role',
            'group',
            'group/detail/{id}',
            'group/update/{id}',
            'group/delete/{id}',
            'group/create',
            'group/manage',
            'permission',
            'permission/detail/{id}',
            'permission/update/{id}',
            'permission/delete/{id}',
            'permission/create',
            'permission/manage',
            'menu',
            'menu/detail/{id}',
            'menu/update/{id}',
            'menu/delete/{id}',
            'menu/create',
            'menu/manage',
        );

        $permission = array();
        for ($i = 0; $i < count($route); $i++)
        {
            array_push($permission, Permission::create(array(
                'route' => $route[$i],
                'enabled' => 1,
            )));

            if ($i <= 2)
            {
                $permission[$i]->group()->attach($mahasiswaGroup);
                $permission[$i]->group()->attach($dosenGroup);
            }
            $permission[$i]->group()->attach($adminGroup);
        }


        $url = array(
            array(
                'name' => 'Pengguna',
                'path' => 'user',
            ),
            array(
                'name' => 'Kelola Pengguna',
                'path' => 'user/manage',
            ),
            array(
                'name' => 'Tambah Pengguna',
                'path' => 'user/create',
            ),
            array(
                'name' => 'Grup',
                'path' => 'group',
            ),
            array(
                'name' => 'Kelola Grup',
                'path' => 'group/manage',
            ),
            array(
                'name' => 'Tambah Grup',
                'path' => 'group/create',
            ),
            array(
                'name' => 'Hak Akses',
                'path' => 'permission',
            ),
            array(
                'name' => 'Kelola Hak Akses',
                'path' => 'permission/manage',
            ),
            array(
                'name' => 'Tambah Hak Akses',
                'path' => 'permission/create',
            ),
            array(
                'name' => 'Menu',
                'path' => 'menu',
            ),
            array(
                'name' => 'Kelola Menu',
                'path' => 'menu/manage',
            ),
            array(
                'name' => 'Tambah Menu',
                'path' => 'menu/create',
            ),
        );

        $menu = array();
        for ($i = 0; $i < count($url); $i++)
        {
            array_push($menu, Menu::create(array(
                'name' => $url[$i]['name'],
                'url' => $url[$i]['path'],
                'parent_id' => 0,
                'order' => $i,
                'enabled' => 1,
            )));

            if ($i <= 0)
            {
                $menu[$i]->group()->attach($mahasiswaGroup);
                $menu[$i]->group()->attach($dosenGroup);
            }
            $menu[$i]->group()->attach($adminGroup);
        }

        $menus = Menu::all();
        foreach ($menu as $menu) 
        {
            $paths = explode('/', $menu->url);
            if (count($paths) > 1)
            {
                $parentMenu = Menu::where('url', $paths[0])->get();
                if ($parentMenu->count() > 0)
                {
                    $menu->parent_id = $parentMenu->first()->id;
                    $menu->save();                                
                }
            }
        }

        DB::connection()->enableQueryLog();
    }

}
