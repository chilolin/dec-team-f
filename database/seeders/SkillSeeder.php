<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public static $skills = [
        [
            'skill_type' => 'language',
            'name' => 'Javascript',
        ],
        [
            'skill_type' => 'language',
            'name' => 'Typescript',
        ],
        [
            'skill_type' => 'language',
            'name' => 'HTML',
        ],
        [
            'skill_type' => 'language',
            'name' => 'CSS',
        ],
        [
            'skill_type' => 'language',
            'name' => 'SCSS',
        ],
        [
            'skill_type' => 'language',
            'name' => 'PHP',
        ],
        [
            'skill_type' => 'language',
            'name' => 'go',
        ],
        [
            'skill_type' => 'language',
            'name' => 'C#',
        ],
        [
            'skill_type' => 'language',
            'name' => 'Ruby',
        ],
        [
            'skill_type' => 'language',
            'name' => 'Java',
        ],
        [
            'skill_type' => 'language',
            'name' => 'Node.js',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Node.js',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Vue.js',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'jQuery',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'NuxtJS',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Next.js',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'laravel',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Beego',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Echo',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'ASP.NET Core MVC',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Ruby on Rails',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Spring Boot',
        ],
        [
            'skill_type' => 'framework',
            'name' => 'Express.js',
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'MVC',
            'version' => null,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'SPA',
            'version' => null,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'SSR',
            'version' => null,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'DDD',
            'version' => null,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'TDD',
            'version' => null,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'Repository',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '要件定義',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '基本設計',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '詳細設計',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '製造',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '結合・総合試験',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '単体試験',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '保守',
            'version' => null,
        ],
        [
            'skill_type' => 'proceeding',
            'name' => 'アジャイル（スクラム）',
            'version' => null,
        ],
        [
            'skill_type' => 'proceeding',
            'name' => 'ウォーターフォール',
            'version' => null,
        ],
        [
            'skill_type' => 'engineer_type',
            'name' => 'フロントエンド',
            'version' => null,
        ],
        [
            'skill_type' => 'engineer_type',
            'name' => 'バックエンド',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PM',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PL',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'SE',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PG',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PO',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PMO',
            'version' => null,
        ],
        [
            'skill_type' => 'database',
            'name' => 'MySQL',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'database',
            'name' => 'MariaDB',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'database',
            'name' => 'MongoDB',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'database',
            'name' => 'Redis',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'database',
            'name' => 'PostgreSQL',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'AWS',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'GCP',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'Azure',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'オンプレ',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'Netlify',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'Vercel',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'Firebase',
            'version' => null,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'docker',
            'version' => null,
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$skills as $skill) {
            if(
                DB::table('skills')
                ->where([
                    ['skill_type', '=', $skill['skill_type']],
                    ['name', '=', $skill['name']],
                ])
                ->get()
                ->isEmpty()
            ){
                DB::table('skills')->insert(array_merge($skill, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }
    }
}
