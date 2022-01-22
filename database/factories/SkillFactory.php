<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * スキル一覧
     */
    public static $skills = [
        [
            'skill_type' => 'language',
            'name' => 'php',
            'version' => 7.1,
        ],
        [
            'skill_type' => 'framework',
            'name' => 'laravel',
            'version' => 8.0,
        ],
        [
            'skill_type' => 'design_pattern',
            'name' => 'mvc',
            'version' => null,
        ],
        [
            'skill_type' => 'process',
            'name' => '設計',
            'version' => null,
        ],
        [
            'skill_type' => 'proceeding',
            'name' => 'アジャイル開発',
            'version' => null,
        ],
        [
            'skill_type' => 'engineer_type',
            'name' => 'フロントエンド',
            'version' => null,
        ],
        [
            'skill_type' => 'position',
            'name' => 'PM',
            'version' => null,
        ],
        [
            'skill_type' => 'Database',
            'name' => 'mysql',
            'version' => 7.0,
        ],
        [
            'skill_type' => 'infrastructure',
            'name' => 'circleci',
            'version' => null,
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  
        
        return self::$skills[random_int(0, count(self::$skills)-1)];
    }
}
