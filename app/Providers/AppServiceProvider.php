<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Los que he ido usanso yo
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        // Para compartir el menu de secciones con todas las vistas
        $secciones = App\Seccion::all();
        View::share('secciones', $secciones);

        date_default_timezone_set('America/Bogota');
        // Unix
        setlocale(LC_TIME, 'es_ES.UTF-8');
        // En windows
        setlocale(LC_TIME, 'spanish');
        
        Blade::directive('dateformat', function ($expression) {            
            return "<?php echo strftime('%A, %d de %B de %Y - %H:%M', strtotime($expression)); ?>"; 
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {   
        $app_url = env('APP_URL');

        if($app_url == 'https://www.innovainc.co'){
            $this->app->bind('path.public', function(){
                return base_path().'/public_html';
                // cambia base_path() por public_path()
                // $path = base_path().'/../public_html/images';
            });
        }
    }
}
