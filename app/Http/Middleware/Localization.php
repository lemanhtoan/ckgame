<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;

/**
 * Localization
 */
class Localization {

    public function __construct(Application $app) {
        $this->app        = $app;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
		$this->app->setLocale('vn');
        return $next($request);
    }
}
?>