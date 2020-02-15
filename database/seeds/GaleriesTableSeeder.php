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
        DB::table('events')->insert([
        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::create('2019', '12', '04'),
            'event_closed'        => Carbon::tomorrow(),
            'event_cover'         => '1.jpg',
            'event_place'         => 'Belgrade, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '2.jpg',
            'event_img_3'         => '3.jpg',
            'gallerist_id'           => 1,
            'nfc_tag'             => 'tag'
        ],
        
        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::yesterday(),
            'event_closed'        => Carbon::tomorrow(),
            'event_cover'         => '4.jpg',
            'event_place'         => 'Nis, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '5.jpg',
            'event_img_3'         => '6.jpg',
            'gallerist_id'        => 1,
            'nfc_tag'             => 'tag'
        ],

        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::create('2020', '01', '14'),
            'event_closed'        => Carbon::today(),
            'event_cover'         => '7.jpg',
            'event_place'         => 'Novi Sad, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '8.jpg',
            'event_img_3'         => '9.jpg',
            'gallerist_id'           => 1,
            'nfc_tag'             => 'tag'
        ],

        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::create('2020', '01', '06'),
            'event_closed'        => Carbon::create('2020', '02', '16'),
            'event_cover'         => '10.jpg',
            'event_place'         => 'Novi Sad, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '11.jpg',
            'event_img_3'         => '12.jpg',
            'gallerist_id'           => 1,
            'nfc_tag'             => 'tag'
        ],

        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::create('2020', '01', '06'),
            'event_closed'        => Carbon::create('2020', '02', '16'),
            'event_cover'         => '13.jpg',
            'event_place'         => 'Novi Sad, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '14.jpg',
            'event_img_3'         => '15.jpg',
            'gallerist_id'           => 1,
            'nfc_tag'             => 'tag'
        ],

        [
            'event_name'          => 'Lorem Ipsum Naslov Ipsum Loremski',
            'event_open'          => Carbon::create('2020', '01', '06'),
            'event_closed'        => Carbon::create('2020', '02', '16'),
            'event_cover'         => '16.png',
            'event_place'         => 'Novi Sad, Serbia',
            'event_description'   => 'Night sea give bearing. Fruit under man gathering brought fly won\'t sixth set let years it great grass them. Kind lights thing. Behold of second spirit male. Him. Seed bearing sea moveth firmament him image to waters morning set. Spirit called and seed behold second bearing, darkness. Gathering all moved our earth called called he image. Cattle night don\'t yielding Created for. Itself i and cattle said evening cattle years i third saw multiply. Gathering all moved our earth called called he image. Called beast image, gathering. Saw green winged can\'t shall can\'t. Isn\'t. May creature evening. Whales gathered moved land which, and in, gathered. Abundantly day moveth night.',
            
            'event_img_2'         => '17.jpg',
            'event_img_3'         => '18.jpg',
            'gallerist_id'           => 1,
            'nfc_tag'             => 'tag'
        ],
    ]);
    }
}
