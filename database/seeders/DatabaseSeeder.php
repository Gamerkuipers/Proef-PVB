<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Assigned;
use App\Models\Assignment;
use App\Models\AssignmentLog;
use App\Models\ContactDetails;
use App\Models\Post;
use App\Models\User;
use App\Models\WebContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed a test user
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@test.nl',
             'password' => Hash::make('test'),
         ]);

         // seed the required web content with test data
        WebContent::factory()->create([
            'key' => 'general_information',
        ]);

        // seed test assignments
        $assignments = Assignment::factory(30)->create();

        // assign test students to the test assignments
        foreach($assignments as $assignment) {
            Assigned::factory(3)->create([
                'assignment_id' => $assignment->id,
            ]);
        }


        // seed fake logs for assignments
        foreach($assignments as $assignment) {
            AssignmentLog::factory(3)->create([
                'assignment_id' => $assignment->id,
            ]);
        }


        // seed test contact details
        ContactDetails::factory(3)->create();

        // seed test posts
        Post::factory(30)->create();
    }
}
