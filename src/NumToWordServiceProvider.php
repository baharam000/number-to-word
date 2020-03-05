<?php

namespace Media365\NumToWord;

use Illuminate\Support\ServiceProvider;

class NumToWordServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->mergeConfigFrom(__DIR__. '/config/num-to-word-ind.php', 'num-to-word-ind' );
    }

    public function register()
    {
        $this->app->singleton(NumToWord::class, function (){
            return new NumToWord();
        });
    }
}
