<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class GaleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
        [
            'gallery_open'          => Carbon::create('2019', '12', '04'),
            'gallery_closed'        => Carbon::tomorrow(),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Belgrade, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '1.jpg',
            'gallery_img_2'         => '2.jpg',
            'gallery_img_3'         => '3.jpg',
        ],
        
        [
            'gallery_open'          => Carbon::yesterday(),
            'gallery_closed'        => Carbon::tomorrow(),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Nis, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '4.jpg',
            'gallery_img_2'         => '5.jpg',
            'gallery_img_3'         => '6.jpg',
        ],

        [
            'gallery_open'          => Carbon::create('2020', '01', '14'),
            'gallery_closed'        => Carbon::today(),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Novi Sad, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '7.jpg',
            'gallery_img_2'         => '8.jpg',
            'gallery_img_3'         => '9.jpg',
        ],

        [
            'gallery_open'          => Carbon::create('2020', '01', '06'),
            'gallery_closed'        => Carbon::create('2020', '02', '16'),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Novi Sad, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '10.jpg',
            'gallery_img_2'         => '11.jpg',
            'gallery_img_3'         => '12.jpg',
        ],

        [
            'gallery_open'          => Carbon::create('2020', '01', '06'),
            'gallery_closed'        => Carbon::create('2020', '02', '16'),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Novi Sad, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '13.jpg',
            'gallery_img_2'         => '14.jpg',
            'gallery_img_3'         => '15.jpg',
        ],

        [
            'gallery_open'          => Carbon::create('2020', '01', '06'),
            'gallery_closed'        => Carbon::create('2020', '02', '16'),
            'gallery_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'gallery_place'         => 'Novi Sad, Serbia',
            'gallery_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            'gallery_cover'         => '16.png',
            'gallery_img_2'         => '17.jpg',
            'gallery_img_3'         => '18.jpg',
        ],
    ]);
    }
}
