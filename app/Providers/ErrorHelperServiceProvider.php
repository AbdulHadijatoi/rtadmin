<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\ErrorHelper;
use Illuminate\Support\Facades\Blade;

class ErrorHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Blade::directive('displayErrors', function () {
            return "<?php echo App\Helpers\ErrorHelper::displayErrors(\$errors); ?>";
});
}

/**
* Bootstrap services.
*/
public function boot(): void
{
//
}
}