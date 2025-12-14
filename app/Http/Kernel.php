protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

    'auth.custom' => \App\Http\Middleware\CustomAuth::class,
];
