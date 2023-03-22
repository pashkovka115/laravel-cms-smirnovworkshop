<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);

        $this->call(CategoryProductsSeeder::class);
        $this->call(CategoriesProductColumnsSeeder::class);
        $this->call(CategoriesProductPropertySeeder::class);

        $this->call(ProductsSeeder::class);
        $this->call(ProductsColumnsSeeder::class);
        $this->call(ProductsPropertySeeder::class);

        $this->call(FeedbackSeeder::class);
        $this->call(FeedbackColumnsSeeder::class);
        $this->call(FeedbackPropertySeeder::class);

        $this->call(ContactsSeeder::class);
        $this->call(ContactsColumnsSeeder::class);
        $this->call(ContactsPropertySeeder::class);

        $this->call(ReviewsSeeder::class);
        $this->call(FeedbackSeeder::class);

        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);
    }
}
