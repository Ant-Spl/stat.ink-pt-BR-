<?php

/**
 * @copyright Copyright (C) 2015-2018 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

use app\components\db\Migration;
use app\components\db\VersionMigration;

class m180112_093124_v2_2_0 extends Migration
{
    use VersionMigration;

    public function safeUp()
    {
        $this->upVersion2(
            '2.2',
            '2.2.x',
            '2.2.0',
            '2.2.0',
            new DateTimeImmutable('2018-01-17T11:00:00+09:00')
        );
    }

    public function safeDown()
    {
        $this->downVersion2('2.2.0', '2.1.1');
    }
}
