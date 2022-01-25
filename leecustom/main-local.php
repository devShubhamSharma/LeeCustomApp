<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=shopify-latest.cluster-c07abb6qygwc.us-east-2.rds.amazonaws.com;dbname=marketplace_integration',
        	//'emulatePrepare' => true,
            'username' => 'admin',            
            'password' => 'jSWAh=e(f4dAYSX}',// 'cedcom2020$',
            'charset' => 'utf8',
            'on afterOpen' => function($event) {
                $event->sender->createCommand("SET time_zone='+5:30';")->execute();
            },
        ],
        /*'integration' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=shopif7_sPy11F',
            'username' => 'shopif7_sPy11F',
            'password' => '-ZD,uo(M+N01',
            'charset' => 'utf8',
        ],*/
        'integration' => [
            // 'class' => 'yii\db\Connection',
            // 'dsn' => 'mysql:host=23.235.214.170;dbname=cedcom6_shopify_integration',
            // //'emulatePrepare' => true,
            // 'username' => 'cedcom6_shopify',
            // 'password' => '$h0pifyp@$$w0rd',
            // 'charset' => 'utf8',
            // 'on afterOpen' => function($event) {
            //     $event->sender->createCommand("SET time_zone='+5:30';")->execute();
            // },
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=shopify-latest.cluster-c07abb6qygwc.us-east-2.rds.amazonaws.com;dbname=integration',
            //'emulatePrepare' => true,
            'username' => 'admin',            
            'password' => 'jSWAh=e(f4dAYSX}',// 'cedcom2020$',
            'charset' => 'utf8',
        ],
       /* 'old' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=shopif7_sPy11F',
            'username' => 'shopif7_sPy11F',
            'password' => '-ZD,uo(M+N01',
            'charset' => 'utf8',
        ],*/
        'blogdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=cedcommerce.com;dbname=cedcom5_BlgQzY', // Maybe other DBMS such as psql (PostgreSQL),...
            'username' => 'cedcom5_BlgQzY',
            'password' => '7s;dq(D^#Z#=',
            'charset' => 'utf8',
        ],
        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'everwith_mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'tls',
                'host' => 'smtp.gmail.com',
                'port' => '587',
                'username' => 'requests@everwith.co.uk',
                'password' => 'qY9kV7nC9nI5tX1x'
            ],
        ],
        'cherisurns_mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'encryption' => 'tls',
                'host' => 'smtp.gmail.com',
                'port' => '587',
                'username' => 'brochure@cherished-urns.co.uk',
                'password' => 'qY9kV7nC9nI5tX1x'
            ],
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            // 'dsn' => 'mongodb+srv://shopify.xxxok.mongodb.net/shopify',
            'dsn' => 'mongodb+srv://shopify.xxxok.mongodb.net/marketplace-integration?retryWrites=true&w=majority',
            'options' => [
                "username" => "shopify",
                "password" => "Y9Ah88Y1m4UQiBtx"
            ],
            "defaultDatabaseName" => "marketplace-integration"
        ],
    ],
    'aliases'=>[
        '@Monolog'=>'@vendor/monolog/monolog/src/Monolog',
        '@Twilio'=>'@vendor/twilio/Twilio',
        // '@Monolog'=>'@vendor/monolog/monolog-master/src/Monolog',
        '@AliexApi' => '@vendor/clchangnet/aliexapi/src/AliexIO',
        '@Overstock' => '@rootdir/frontend/modules/overstock/lib/sdk/Overstock',
        '@yii/mongodb' => '@vendor/yiisoft/yii2-mongodb',
        // '@NeweggApi' => '@vendor/cedcoss/NeweggB2B-API-SDK/src',
    ],
];
