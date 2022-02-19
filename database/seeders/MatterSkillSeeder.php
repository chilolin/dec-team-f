<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Matter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatterSkillSeeder extends Seeder
{
    public $matter_skills = [
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA,MVC' ,  'language' => 'Javascript,PHP' ,  'framework' => 'NuxtJS,laravel' ,  'database' => 'MariaDB' , 'position' => 'PM,PL,SE,PG,PO,PMO','process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,PHP' ,  'framework' => 'Next.js,laravel' ,  'database' => 'MariaDB' ,'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SSR,DDD' ,  'language' => 'Javascript,PHP' ,  'framework' => 'Vue.js,laravel' ,  'database' => 'MariaDB' ,'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SSR' ,  'language' => 'Javascript,PHP' ,  'framework' => 'Jquery,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA,DDD' ,  'language' => 'Typescript,PHP' ,  'framework' => 'NuxtJS,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,PHP' ,  'framework' => 'Next.js,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,Ruby' ,  'framework' => 'NuxtJS,Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,Ruby' ,  'framework' => 'Next.js,Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,MVC,Repository' ,  'language' => 'Javascript,PHP' ,  'framework' => 'Vue.js,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,Repository' ,  'language' => 'Javascript,PHP' ,  'framework' => 'Jquery,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,PHP' ,  'framework' => 'NuxtJS,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,PHP' ,  'framework' => 'Next.js,laravel' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,go' ,  'framework' => 'NuxtJS,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,go' ,  'framework' => 'Next.js,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SSR' ,  'language' => 'Javascript,Ruby' ,  'framework' => 'Vue.js,Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SSR,MVC' ,  'language' => 'Ruby' ,  'framework' => 'Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SPA' ,  'language' => 'go' ,  'framework' => 'Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SPA' ,  'language' => 'go' ,  'framework' => 'Echo' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,go' ,  'framework' => 'NuxtJS,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript,go' ,  'framework' => 'Next.js,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,DDD' ,  'language' => 'Javascript,Ruby' ,  'framework' => 'Vue.js,Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR' ,  'language' => 'Javascript,Ruby' ,  'framework' => 'Jquery,Ruby on Rails' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA,Repository' ,  'language' => 'Typescript,go' ,  'framework' => 'NuxtJS,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,go' ,  'framework' => 'Next.js,Beego' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => '' ,  'language' => 'Javascript' ,  'framework' => 'NuxtJS' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => '' ,  'language' => 'Javascript' ,  'framework' => 'Next.js' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => '' ,  'language' => 'Javascript' ,  'framework' => 'Vue.js' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => '' ,  'language' => 'Javascript' ,  'framework' => 'Jquery' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => '' ,  'language' => 'Typescript' ,  'framework' => 'NuxtJS' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'アジャイル（スクラム）' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,C#' ,  'framework' => 'Next.js,ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SPA,DDD' ,  'language' => 'C#' ,  'framework' => 'ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SPA,MVC,Repository' ,  'language' => 'C#' ,  'framework' => 'ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => 'SSR' ,  'language' => 'C#' ,  'framework' => 'ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,MVC' ,  'language' => 'Javascript,C#' ,  'framework' => 'Jquery,ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,C#' ,  'framework' => 'NuxtJS,ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Typescript,C#' ,  'framework' => 'Next.js,ASP.NET Core MVC' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA,Repository' ,  'language' => 'Javascript' ,  'framework' => 'NuxtJS,' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SPA' ,  'language' => 'Javascript' ,  'framework' => 'Next.js' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'Vercel' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,MVC' ,  'language' => 'Javascript' ,  'framework' => 'Vue.js' ,  'database' => '' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Java' ,  'framework' => 'Spring Boot' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Node.js' ,  'framework' => 'Express.js' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Node.js' ,  'framework' => 'Express.js' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Node.js' ,  'framework' => 'Express.js' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Node.js' ,  'framework' => 'Express.js' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Java' ,  'framework' => 'Spring Boot' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => 'ウォーターフォール' ,  'design_pattern' => 'SSR,DDD' ,  'language' => 'Javascript,Java' ,  'framework' => 'Jquery,Spring Boot' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Java' ,  'framework' => 'Spring Boot' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
        [ 'infrastructure' => 'AWS' ,  'proceeding' => '' ,  'design_pattern' => '' ,  'language' => 'Java' ,  'framework' => 'Spring Boot' ,  'database' => 'MariaDB' ,  'position' => 'PM,PL,SE,PG,PO,PMO', 'process' => '要件設計,基本設計,詳細設計,製造,結合・総合試験,単体試験,保守' ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Matter::all() as $matter) {
            $matter_skill = $this->matter_skills[$matter->id-1];

            foreach($matter_skill as $skill_type => $skill_names) {
                if (!$skill_names) continue;

                $skill_names = explode(',', $skill_names);
                foreach($skill_names as $skill_name) {
                    if (!$skill_name) continue;

                    $skill = Skill::where([['skill_type', '=', $skill_type], ['name', '=', $skill_name]])->get();
                    if (count($skill) == 0) {
                        $skill = Skill::create(['name' => $skill_name, 'skill_type' => $skill_type, 'created_at' => now(), 'updated_at' => now()]);
                    } else {
                        $skill = $skill[0];
                    }

                    DB::table('matter_skill')->insert(
                        [
                            'matter_id' => $matter->id,
                            'skill_id' => $skill->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }
        }
    }
}
