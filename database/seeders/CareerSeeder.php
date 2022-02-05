<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
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
            $user_id = User::select('id')->orderByRaw("RAND()")->first()->id;
            $skill_id = Skill::select('id')->orderByRaw("RAND()")->first()->id;
            $level = (float)rand(1, 10)/2.0;

            $careers = DB::table('careers')
                            ->where([
                                ['user_id', '=', $user_id],
                                ['skill_id', '=', $skill_id],
                                ['level', '=', $level],
                            ])->get();

            if($careers->isEmpty()){
                DB::table('careers')->insert(
                    [
                        'user_id' => $user_id,
                        'skill_id' => $skill_id,
                        'level' => $level,
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
