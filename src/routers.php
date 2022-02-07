<?php
/*
 defining route table
*/
$app->get('/',                                  'HomeController:getIndex')->setName('home');
$app->get('/login',                             'HomeController:getLogin')->setName('login');
