<?php

namespace App\Providers;

use App\Consts\SkillType;
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
        View::share('skill_types', SkillType::SKILL_TYPES);
        View::share('skill_types_in_jp', SkillType::SKILL_TYPES_IN_JP);
        View::share('language', SkillType::LANGUAGE);
        View::share('framework', SkillType::FRAMEWORK);
        View::share('design_pattern', SkillType::DESIGN_PATTERN);
        View::share('process', SkillType::PROCESS);
        View::share('proceeding', SkillType::PROCEEDING);
        View::share('position', SkillType::POSITION);
        View::share('database', SkillType::DATABASE);
        View::share('infrastructure', SkillType::INFRASTRUCTURE);
    }
}
