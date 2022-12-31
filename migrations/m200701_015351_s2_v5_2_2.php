<?php

/**
 * @copyright Copyright (C) 2015-2020 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

use app\components\db\Migration;
use app\components\db\VersionMigration;

class m200701_015351_s2_v5_2_2 extends Migration
{
    use VersionMigration;

    public function safeUp()
    {
        $this->upVersion2(
            '5.2',
            '5.2.x',
            '5.2.2',
            '5.2.2',
            new DateTimeImmutable('2020-07-01T11:00:00+09:00'),
        );
    }

    public function safeDown()
    {
        $this->downVersion2('5.2.2', '5.2.1');
    }
}
