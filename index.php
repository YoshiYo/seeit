<?php

  require 'vendor/autoload.php';

  $app = new \Slim\Slim();

  $app->get('/', function () {
    echo "Hello";
  });

  $app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
  });
  
  echo "nard";

  $app->run();

  echo 'Notre premier test github - master';
  echo 'Coucou c'est Auguste';
