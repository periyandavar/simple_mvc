<?php
    Routes::get(['url' => 'login', 'controller' => 'UserController', 'method' => 'login']);
    Routes::get(['url' => 'register', 'controller' => 'UserController', 'method' => 'register']);
    Routes::post(['url' => 'login', 'controller' => 'UserController', 'method' => 'doLogin']);
    Routes::post(['url' => 'register', 'controller' => 'UserController', 'method' => 'doRegister']);
