<?php

/**
 * @copyright Copyright (C) 2015-2022 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\commands\stat;

use app\commands\stat\salmon3\TideEventTrait;

trait Salmon3Trait
{
    use TideEventTrait;

    protected function updateEntireSalmon3(): void
    {
        $this->makeStatSalmon3TideEvent();
    }
}
