<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Texts;
class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('user')->insert([
//           'name' => Str::random(10),
//            'email' => Str::random(10).'@163.com',
//            'password' => bcrypt('secret'),
//            'state' => rand(0,1),
//            'age' => rand(1,120)
//        ]);
        $text = factory(Texts::class,50)->make();
        Texts::insert($text->toArray());
    }
}
