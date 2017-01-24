<?php

namespace App;


use App\Modules\AddSkypeField;

class Kernel
{
    public $modules = [];

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->modules = [
            new AddSkypeField()
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