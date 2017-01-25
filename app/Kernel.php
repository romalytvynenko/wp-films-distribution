<?php

namespace App;

use App\Modules\AddSkypeField;
use App\Modules\FilmsProduct;
use App\Modules\InstantPay;
use App\Modules\RegisterWorkflow;

class Kernel
{
    public $modules = [];

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->modules = [
            new AddSkypeField(),
            new RegisterWorkflow(),
            new FilmsProduct(),
            new InstantPay()
        ];
    }

    /**
     * Init all hooks from the modules
     */
    public function run()
    {
        foreach ($this->modules as $module) {
            $module->init();
        }
    }
}