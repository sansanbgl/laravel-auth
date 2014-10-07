<?php 
/**
 * MyHasherServiceProvider
 * digunakan untuk IoC (meng-inject) komponen 'hash'.
 */
namespace Libraries;
use Illuminate\Support\ServiceProvider;

class MyHasherServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('hash', function()
        {
            return new MyHasher;
        });
    }

}