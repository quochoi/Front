<?php

namespace Foostart\Front;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class FrontServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/front_admin.php' => config_path('front_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'front');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'front');


        /**
         * Load view composer
         */
        $this->frontViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Front\Controllers\Admin\FrontAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'front');
    }

    /**
     *
     */
    public function frontViewComposer(Request $request) {

        view()->composer('front::front*', function ($view) {
            global $request;
            $front_id = $request->get('id');
            $is_action = empty($front_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Fronts
                 */
                //list
                trans('front::front.page_list') => [
                    'url' => URL::route('admin_front'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('front::front.'.$is_action) => [
                    'url' => URL::route('admin_front.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

            ]);
            //
        });
    }

}
