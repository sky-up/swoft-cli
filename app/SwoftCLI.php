<?php declare(strict_types=1);

namespace Swoft\Cli;

use Swoft;
use Swoft\Stdlib\Helper\Sys;
use Swoft\SwoftApplication;
use function dirname;
use function ini_set;

/**
 * Class SwoftCLI
 */
class SwoftCLI extends SwoftApplication
{
    protected function afterInit(): void
    {
        parent::afterInit();

        $this->setRuntimePath(Sys::getTempDir());

        // fix: on php73 preg_* error
        ini_set('pcre.jit', 'off');

        Swoft::setAlias('@swoftcli', dirname(__DIR__));
    }

    public function getCLoggerConfig(): array
    {
        $config = parent::getCLoggerConfig();
        // disable
        $config['enable'] = false;
        // \var_dump($config);die;
        return $config;
    }
}
