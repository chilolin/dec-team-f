<?php

namespace App\Consts;

class SkillType {
    const LANGUAGE = 'language';
    const FRAMEWORK = 'framework';
    const DESIGN_PATTERN = 'design_pattern';
    const PROCESS = 'process';
    const PROCEEDING = 'proceeding';
    const ENGINEER_TYPE = 'engineer_type';
    const POSITION = 'position';
    const DATABASE = 'database';
    const INFRASTRUCTURE = 'infrastructure';

    const SKILL_TYPES = [
        self::LANGUAGE,
        self::FRAMEWORK,
        self::DESIGN_PATTERN,
        self::PROCESS,
        self::PROCEEDING,
        self::ENGINEER_TYPE,
        self::POSITION,
        self::DATABASE,
        self::INFRASTRUCTURE,
    ];

    const SKILL_TYPES_IN_JP = [
        self::LANGUAGE => 'プログラミング言語',
        self::FRAMEWORK => 'フレームワーク',
        self::DESIGN_PATTERN => 'デザインパターン',
        self::PROCESS => '開発工程',
        self::PROCEEDING => '開発の進め方',
        self::ENGINEER_TYPE => 'エンジニアの種類',
        self::POSITION => '役割',
        self::DATABASE => 'データベース',
        self::INFRASTRUCTURE => 'インフラ技術',
    ];
}
