<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $skill_types = [
            'language',
            'framework',
            'design_pattern',
            'process',
            'proceeding',
            'engineer_type',
            'position',
            'database',
            'infrastructure',
        ];
        $skill_type_translator = [
            'language' => 'プログラミング言語',
            'framework' => 'フレームワーク',
            'design_pattern' => 'デザインパターン',
            'process' => '開発工程',
            'proceeding' => '開発の進め方',
            'engineer_type' => 'エンジニアの種類',
            'position' => '役職',
            'database' => 'データベース',
            'infrastructure' => 'インフラ技術',
        ];

        View::share('skill_type', $skill_types);
        View::share('skill_type_translator', $skill_type_translator);
    }
}
