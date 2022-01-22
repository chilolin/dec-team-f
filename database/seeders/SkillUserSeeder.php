<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillUserSeeder extends Seeder
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
            $is_practice = (bool)random_int(0, 1);
            $is_learning = (bool)random_int(0, 1);
            $level = (float)rand(1, 10)/2.0;

            $skill_user = DB::table('skill_user')
                            ->where([
                                ['user_id', '=', $user_id],
                                ['skill_id', '=', $skill_id],
                                ['is_practice', '=', $is_practice],
                                ['is_learning', '=', $is_learning],
                                ['level', '=', $level],
                            ])->get();

            if($skill_user->isEmpty()){
                DB::table('skill_user')->insert(
                    [
                        'user_id' => $user_id,
                        'skill_id' => $skill_id,
                        'is_practice' => $is_practice,
                        'is_learning' => $is_learning,
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
