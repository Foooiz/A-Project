<p>环境：php7.0</p>

[Demo地址](http://a-foo.herokuapp.com/)
<p>站长账号:test@test.com 通用密码:password</p>
ps:由于heroku在境外，所以访问较慢，并且免费用户不支持文件存储系统，所以更换头像和插入图片后无法持久保存，请仅在test用户上进行头像和图片测试操作。

项目安装步骤：
1. git clone git@github.com:Foooiz/A-Project.git
2. composer install
3. cp .env.example .env，并配置相应参数
4. php artisan key:generate
5. php artisan migrate --seed
6. php artisan queue:work 或 php artisan horizon

功能：
- 多角色用户权限：站长，管理员，普通用户
- 后台管理系统，登录站长或管理员账号右上角下拉菜单进入
- 使用redis缓存边栏活跃用户，并使用任务调度进行一小时一次的更新
- 内置百度翻译SEO，配置相关参数并取消注释后可使用
- 使用预加载优化了数据查询
- 回复提醒使用了队列发送邮件并将未读消息存入数据库用于提示
- 对每个模块使用RESTful设计风格增加了API接口，其中集成了手机验证注册/微信第三方登录
