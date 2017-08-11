<?php
namespace MyVendor\Locale\Module;

use BEAR\Accept\AcceptModule;
use BEAR\Package\PackageModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new EnModule);
        $this->install(new PackageModule);
    }
}
