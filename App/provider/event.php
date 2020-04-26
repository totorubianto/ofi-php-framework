<?php

/**
 * Event service
 * You can custom your event service configuration
 * You can read explanation in each method
 */


namespace App\provider;

class event {

    /**
     * This method still called
     * when this framework is running
     */

    public function whenRun()
    {
        # code...
    }

    /**
     * This method will called when someone user
     * trying to login to your system
     */

    public function whenLogin()
    {
        # code...
    }

    /**
     * This method will called when someone user
     * trying to registration to your system
     */

    public function whenRegistration()
    {
        # code...
    }

    /**
     * This method will called when your system
     * have 400 or 500 error
     */

    public function whenError()
    {
        # code...
    }
}