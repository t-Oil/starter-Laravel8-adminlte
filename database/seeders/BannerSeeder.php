<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'uuid' => Str::uuid(),
            'title' => 'Title Banner',
            'image' => 'https://picsum.photos/200/300',
            'ordinal_no' => 1,
            'start_datetime' => Carbon::now(),
            'end_datetime' => Carbon::now(),
            'is_active' => 1
        ]);
    }
}
