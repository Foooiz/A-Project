<?php

return [
    'title' => '站点设置',

    'permission'=> function()
    {
        return Auth::user()->hasRole('Founder');
    },

    'edit_fields' => [
        'site_name' => [

            'title' => '站点名称',

            'type' => 'text',

            'limit' => 50,
        ],
        'contact_email' => [
            'title' => '联系人邮箱',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => '请填写站点名称。',
        'contact_email.email' => '请填写正确的联系人邮箱格式。',
    ],

    'before_save' => function(&$data)
    {
        if (strpos($data['site_name'], 'A-Project') === false) {
            $data['site_name'] .= ' - A-Project';
        }
    },

    'actions' => [

        'clear_cache' => [
            'title' => '更新系统缓存',

            'messages' => [
                'active' => '正在清空缓存...',
                'success' => '缓存已清空！',
                'error' => '清空缓存时出错！',
            ],

            'action' => function(&$data)
            {
                \Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];
