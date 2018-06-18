<?php

use Illuminate\Database\Seeder;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Retrievers\Posts::class, 5)->create()->each(function ($u) {
            $u = factory(App\Retrievers\Posts::class)->make();
        });
    }
}
