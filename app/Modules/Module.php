<?php

namespace App\Modules;


abstract class Module
{
    /**
     * Add hooks for module
     */
    abstract public function init();
}