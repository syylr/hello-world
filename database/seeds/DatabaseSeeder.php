<?php

use Illuminate\Database\Seeder;
//require 'ArticleSeeder.php';//because i don't install composer,can't autoload class,so need require the class
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ArticleSeeder::class);
    }
}
