<?php

//Turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);
//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
//:: is used to call a method within the static Base class within fat-free
$f3 = Base::instance();

//Define a default route
//
$f3->route('GET /', function($f3) {

    //Add variables to the f3 hive
    //basically we are using the index page to store data to use in our views pages

    //fat free allows us to pass our global $f3 into our function so we can call it in the scope of the function
    $f3->set('username', 'jshmo');
    //sha1 encrypts the password
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Fun with Templating');
    $f3->set('color', 'red');
    $f3->set('radius', 10);
    $f3->set('fruits', array('orange', 'apple', 'banana' ));

    //associative array
    $f3->set('desserts', array('chocolate' => 'Chocolate Mousse',
                                'vanilla' => 'Vanilla Custard',
                                'strawberry' => 'Strawberry Shortcake'));

    $view = new Template();
    echo $view->render('views/info.html');
});

//Run fat free
// -> is invoking the run() method in the fat-free
$f3->run();