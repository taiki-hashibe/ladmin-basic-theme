<?php

namespace LowB\LadminBasicTheme\Commands;

use Illuminate\Console\Command;

class LadminBasicThemeCommand extends Command
{
    public $signature = 'ladmin-basic-theme';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
