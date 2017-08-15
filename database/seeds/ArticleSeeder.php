<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fill fake data
        DB::table('articles')->delete();
        for($i=0;$i<=50;$i++){
            \App\Article::create([
                'title'=>'Title'.$i,
                'body'=>'Body'.$i,
                'user_id'=>1,
            ]);
        }
    }
}
