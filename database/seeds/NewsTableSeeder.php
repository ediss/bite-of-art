<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'article_name'          => 'Vest 1',
                'article_cover'         => '/images/news/1.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1

            ],
            
            [
                'article_name'          => 'Vest 2',
                'article_cover'         => '/images/news/2.png',
                'article_description'   => 'neki opis',
                'user_id'               => 1
            ],
            [
                'article_name'          => 'Vest 3',
                'article_cover'         => '/images/news/3.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1

            ],
            
            [
                'article_name'          => 'Vest 4',
                'article_cover'         => '/images/news/4.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1
            ],
            [
                'article_name'          => 'Vest 5',
                'article_cover'         => '/images/news/5.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1

            ],
            
            [
                'article_name'          => 'Vest 6',
                'article_cover'         => '/images/news/6.png',
                'article_description'   => 'neki opis',
                'user_id'               => 1
            ],
            [
                'article_name'          => 'Vest 7',
                'article_cover'         => '/images/news/7.png',
                'article_description'   => 'neki opis',
                'user_id'               => 1

            ],
            
            [
                'article_name'          => 'Vest 8',
                'article_cover'         => '/images/news/8.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1
            ],
            [
                'article_name'          => 'Vest 9',
                'article_cover'         => '/images/news/9.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1

            ],
            
            [
                'article_name'          => 'Vest 10',
                'article_cover'         => '/images/news/10.jpg',
                'article_description'   => 'neki opis',
                'user_id'               => 1
            ]
        ]);
    }
}
