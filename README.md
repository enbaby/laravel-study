# laravel-study
laravel study tips
1.当laravel需要记录每次访问的url地址时，可以做以下操作，可以根据环境配置确定是否需要记录
1)创建名字为RouteLog的Middleware,具体代码看文件
2)添加到Kernel文件，添加middleware
\App\Http\Middleware\RouteLog::class,


2.当laravel需要记录数据库查询日志时，可以做以下操作
1)增加MysqlEventListener监听器，具体代码看文件
2)增加监听器到EventServiceProvider，具体代码看文件
protected $listen = [
    'illuminate.query' => [
        'App\Listeners\MysqlEventListener',
    ],
];
