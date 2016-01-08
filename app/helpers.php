<?php

/*
 * This class gets autoloaded by composer.json (see composer.json entry).  One must run
 * composer dump-autoload after adding a file to get autoloaded.
 *
 * If you just call the flash() method flash('blah', 'blahblah'), then this helper function gets
 * called and it actually ends up using the $flash object and calling $flash->info('blah', 'blahblah');
 * anyways.
 *
 * If you call flash()->info('blah', 'blahblah'); you actually hit the
 * if(func_num_args() == 0) block because flash() has no parameters,
 * which returns the $flash object.  So this helper function basically
 * creates a new $flash object for you and then either calls the method
 * on that object that you specify or by default will call the info() method.
 */
function flash($title = null, $message = null)
{
    // The below creates a flash object out of the service container.
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0){
        return $flash;
    }

    return $flash->info($title, $message);
}