<?php

namespace Jarvishubtech\NumToWord;

use Illuminate\Support\ServiceProvider;

class NumToWordServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton(NumToWord::class, function (){
            return new NumToWord();
        });
    }
}
