<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Matter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatterSkillSeeder extends Seeder
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
            $skill_id = Skill::select('id')->orderByRaw("RAND()")->first()->id;
            $engineer_type = Skill::where('skill_type', 'engineer_type')->select('id')->orderByRaw("RAND()")->first()->id;

            $matter_skill = DB::table('matter_skill')
                            ->where([
                                ['matter_id', '=', $matter_id],
                                ['skill_id', '=', $skill_id],
                                ['enginner_type', '=', $engineer_type]
                            ])->get();

            if($matter_skill->isEmpty()){
                DB::table('matter_skill')->insert(
                    [
                        'matter_id' => $matter_id,
                        'skill_id' => $skill_id,
                        'enginner_type' => $engineer_type,
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
