<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Matter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MatterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_counts = 10;

        for ($i = 0; $i < $data_counts; $i++) {
            $matter_id = Matter::select('id')->orderByRaw("RAND()")->first()->id;
            $user_id = User::select('id')->orderByRaw("RAND()")->first()->id;

            $matter_skill = DB::table('matter_user')
                            ->where([
                                ['matter_id', '=', $matter_id],
                                ['user_id', '=', $user_id],
                            ])->get();

            if($matter_skill->isEmpty()){
                DB::table('matter_user')->insert(
                    [
                        'matter_id' => $matter_id,
                        'user_id' => $user_id,
                        'start_at' => Carbon::parse('2021-01-01'),
                        'end_at' => Carbon::parse('2022-03-31'),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }else{
                $i--;
            }
        }
    }
}
