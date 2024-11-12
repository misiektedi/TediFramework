<?php

use Molkuski\TediFramework\TediView;
use Molkuski\TediFramework\TediRoute;

use Molkuski\TediFramework\TediLogic;
use Molkuski\TediFramework\TediConfig;

use Molkuski\TediFramework\TediFramework;

TediRoute::get('/', function () {
    TediView::Show('welcomed');
});

TediRoute::get('/debug', function () {
    TediConfig::get('app', 'app/debug');
});

TediRoute::get('/about', function () {
    TediFramework::About();
});

TediRoute::get('/hello', function () {
    TediLogic::Run('hello');
});

TediRoute::get('/company', function () {
    TediView::Show('company/hello');
});