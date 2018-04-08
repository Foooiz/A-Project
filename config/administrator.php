<?php

return array(

    'uri' => 'admin',

    'domain' => '',

    'title' => env('APP_NAME', 'Laravel'),

    'model_config_path' => config_path('administrator'),

    'settings_config_path' => config_path('administrator/settings'),

     'menu' => [
         '用户与权限' => [
             'users',
             'roles',
             'permissions',
         ],
         '内容管理' => [
             'categories',
             'topics',
             'replies',
         ],
         '站点管理' => [
             'settings.site',
             'links',
         ],
     ],

    'permission' => function () {
        return Auth::check() && Auth::user()->can('manage_contents');
    },

    'use_dashboard' => false,

    'dashboard_view' => '',

    'home_page' => 'topics',

    'back_to_site_path' => '/',

    'login_path' => 'permission-denied',

    'login_redirect_key' => 'redirect',

    'global_rows_per_page' => 20,

    'locales' => [],
);
