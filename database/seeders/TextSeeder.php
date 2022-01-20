<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'page' => 'home',
                'position' => 1,
                'title' => 'Over ons',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat. Praesent sit amet dolor euismod, mollis leo non, tristique arcu. Pellentesque et fermentum tellus, vel dignissim mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ac lorem vitae ante molestie sodales et fringilla sapien. Proin elementum lectus ac mi posuere malesuada. Nam lacinia tristique quam, volutpat porta augue sodales quis. Curabitur fringilla nibh sit amet leo aliquet tincidunt. Proin tempor sit amet enim sit amet sollicitudin. Cras eu vulputate purus. Curabitur augue arcu, semper sed placerat at, vestibulum ac urna. Praesent rutrum diam sed euismod euismod. In non tortor ut lectus varius finibus. Phasellus suscipit dapibus felis quis tempus. In commodo diam leo, eu porta enim ullamcorper sed. Nullam in tellus ac odio euismod tempus vel vel urna. Maecenas euismod scelerisque nibh malesuada pretium. Etiam facilisis ullamcorper rhoncus. Aliquam et tincidunt mauris, at egestas augue. Vestibulum gravida consequat consequat. Vivamus sed luctus sem, quis pretium velit.',
            ],
            [
                'page' => 'about-us',
                'position' => 1,
                'title' => 'stad',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat. Praesent sit amet dolor euismod, mollis leo non, tristique arcu. Pellentesque et fermentum tellus, vel dignissim mi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ac lorem vitae ante molestie sodales et fringilla sapien. Proin elementum lectus ac mi posuere malesuada. Nam lacinia tristique quam, volutpat porta augue sodales quis. Curabitur fringilla nibh sit amet leo aliquet tincidunt. Proin tempor sit amet enim sit amet sollicitudin. Cras eu vulputate purus. Curabitur augue arcu, semper sed placerat at, vestibulum ac urna. Praesent rutrum diam sed euismod euismod. In non tortor ut lectus varius finibus. Phasellus suscipit dapibus felis quis tempus. In commodo diam leo, eu porta enim ullamcorper sed. Nullam in tellus ac odio euismod tempus vel vel urna. Maecenas euismod scelerisque nibh malesuada pretium. Etiam facilisis ullamcorper rhoncus. Aliquam et tincidunt mauris, at egestas augue. Vestibulum gravida consequat consequat. Vivamus sed luctus sem, quis pretium velit.',
            ],
            [
                'page' => 'about-us',
                'position' => 2,
                'title' => 'title',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat.',
            ],
            [
                'page' => 'about-us',
                'position' => 3,
                'title' => 'title',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat.',
            ],
            [
                'page' => 'about-us',
                'position' => 4,
                'title' => 'title',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat.',
            ],
            [
                'page' => 'about-us',
                'position' => 5,
                'title' => 'title',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat.',
            ],
            [
                'page' => 'about-us',
                'position' => 6,
                'title' => 'title',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus tortor, facilisis sed massa vel, malesuada mollis erat. Nullam sed rutrum erat.',
            ],
        ];
        foreach ($data as $item) {
            DB::table('texts')->insert([
                'page' => $item['page'],
                'position' => $item['position'],
                'title' => $item['title'],
                'text' => $item['text'],
            ]);
        }

    }
}
