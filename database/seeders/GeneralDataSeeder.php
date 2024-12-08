<?php

namespace Database\Seeders;

use App\Models\GeneralData;
use App\Models\User;
use Illuminate\Database\Seeder;

class GeneralDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();
        $generalData = GeneralData::factory(50)->make();
        foreach ($generalData as $item) {
            $item->user()->associate($user);
            $item->save();
        }
    }
}
