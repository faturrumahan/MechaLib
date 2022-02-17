<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use App\Models\Submission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin007',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('admin123')
        ]);

        Category::create([
            'name' => 'Submission',
            'slug' => 'submission',
            'image' => 'img\keyboard.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard',
            'image' => 'category-img/dwuJZ2cwqiMAhKh4MRJfyGMie0UwVwFqFAhMDTNg.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Switch',
            'slug' => 'switch',
            'image' => 'category-img/m3JLID2uvqBr92w4auv8LTMRCMBdcwnaHZWi3J5L.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Keycap',
            'slug' => 'keycap',
            'image' => 'category-img/pSvMRlkiNbhw7AHNwxy0LrJWigSohfAFF3Km974Q.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'PCB',
            'slug' => 'pcb',
            'image' => 'category-img/KHcDTLByfCknWpcmjziQcYiUKUzPtVsoHpLmtsMc.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Case',
            'slug' => 'case',
            'image' => 'category-img/MyFYn9pkJbYL7MURfJOFlzJUeNqzE9CBmLSPMZpf.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Plate',
            'slug' => 'plate',
            'image' => 'category-img/cviZ00xanM3NtKCI5x752p69NUniLKRxcTmWX3Hx.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Stabilizer',
            'slug' => 'stabilizer',
            'image' => 'category-img/ke8m2fnjXlVVflJyOG0dA1MVAeX9E98X9O3X1df3.jpg',
            'description' => 'asd'
        ]);

        Category::create([
            'name' => 'Other',
            'slug' => 'other',
            'image' => 'category-img/tOCMOFpkDVWTpSbTAMq1H6YCwFHBWYTnl1kOP0ee.jpg',
            'description' => 'asd'
        ]);
    }
}
