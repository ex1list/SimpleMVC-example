<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * [Образец] файла для локального перопределения
 * (миниум того, что скорее всего придётся переопредлить)
 */

$config = [
    'core' => [ // подмассив используемый самим ядром фреймворка
        'db' => [ // подмассив конфигурации БД
            'dns' => 'mysql:host=localhost;dbname=smvcbase',
            'username' => 'root',
            'password' => '12345'
        ]
    ]    
];


return $config;