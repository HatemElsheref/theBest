<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire {var?}', function ($var=null) {
//    $this->comment(Inspiring::quote());
    $this->info("Hello Hatem Mohammed $var");
})->describe('Display an inspiring quote');

