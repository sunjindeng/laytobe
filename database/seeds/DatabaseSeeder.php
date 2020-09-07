<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Channels;
use App\Models\Subscription;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        #$this->call(\App\Models\Text::class);
       /* $this->call([
            TextsTableSeeder::class
        ]);*/

        $userOne = factory(User::class)->create([
           'email' => '871183373@qq.com'
        ]);

        $userTwo = factory(User::class)->create([
           'email' => '85633876@qq.com'
        ]);
        $channelOne = factory(Channels::class)->create([
           'user_id' => $userOne->id
        ]);

        $channelTwo = factory(Channels::class)->create([
           'user_id' => $userTwo->id
        ]);
        $channelOne->subscriptions()->create([
            'user_id' => $userTwo->id
        ]);

        $channelTwo->subscriptions()->create([
            'user_id' => $userOne->id
        ]);
        factory(Subscription::class,5000)->create([
            'channels_id' => $channelOne->id
        ]);
        factory(Subscription::class,5000)->create([
            'channels_id' => $channelTwo->id
        ]);
    }
}
