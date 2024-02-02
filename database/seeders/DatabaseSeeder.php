<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $owner = \App\Models\User::factory(1)->create()->first();
        $player = \App\Models\User::factory(2)->create();

        $group = \App\Models\Group::factory(1)->create([
            'owner_id' => $owner->id
        ])->first();

        $group->players()->sync($player->map(fn($user) => $user->id));

        $users = $player;
        $users->push($owner);

        $users->each(function ($user) {
            $user->entities()->saveMany(\App\Models\Entity::factory(1)->make());
        });
    }
}
