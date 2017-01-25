<?php

namespace App\Modules;


class RegisterWorkflow extends Module
{
    /**
     * Add hooks for module
     */
    public function init()
    {
        add_filter('registration_redirect', [$this, 'setRedirectAfterAuthUrl']);
    }

    /**
     * URL for redirection after succeed register
     *
     * @return string|void
     */
    public function setRedirectAfterRegisterUrl()
    {
        return home_url('/product-category/featured/');
    }
}