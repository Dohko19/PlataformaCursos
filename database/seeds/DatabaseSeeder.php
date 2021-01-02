<?php

use App\Category;
use App\Course;
use App\Goal;
use App\Level;
use App\Requirement;
use App\Role;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Storage::deleteDirectory('courses');
    	Storage::deleteDirectory('users');
    	Storage::makeDirectory('users');
    	Storage::makeDirectory('courses');

    	factory(Role::class, 1)->create(['name' => 'admin']);
    	factory(Role::class, 1)->create(['name' => 'teacher']);
    	factory(Role::class, 1)->create(['name' => 'student']);

    	factory(User::class, 1)->create([
    		'name' => 'admin',
    		'email' => 'admin@email.com',
    		'password' => bcrypt('123123'),
    		'role_id' => Role::ADMIN,
    	])->each(function(User $u){
    		factory(Student::class, 1)->create(['user_id' => $u->id]);
    	});

    	factory(User::class, 50)->create()
		    	->each(function(User $u){
		    		factory(Student::class, 1)->create(['user_id' => $u->id]);
		    	});

    	factory(User::class, 50)->create()
		    	->each(function(User $u){
		    		factory(Student::class, 1)->create(['user_id' => $u->id]);
		    		factory(Teacher::class, 1)->create(['user_id' => $u->id]);
		    	});

		    	factory(Level::class, 1)->create(['name' => 'Beginner']);
		    	factory(Level::class, 1)->create(['name' => 'Intermediate']);
		    	factory(Level::class, 1)->create(['name' => 'Advanced']);
		    	factory(Category::class, 5)->create();

        factory(Course::class, 50)->create()
        ->each(function(Course $c){
            $c->goals()->saveMany(factory(Goal::class, 2)->create());
            $c->goals()->saveMany(factory(Requirement::class, 4)->create());
        });
        // $this->call(UsersTableSeeder::class);
    }
}
