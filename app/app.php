<?php

  require_once(__DIR__.'/../vendor/autoload.php');
  require_once(__DIR__.'/../src/Client.php');
  require_once(__DIR__.'/../src/Stylist.php');
  date_default_timezone_set('America/New_York');

  $server = 'mysql:host=localhost; db-name=salon_db';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  $app->get("/", function() use ($app)
    {
      $clients = Client::getAll();
      $stylists = Stylist::getAll();
      return $app['twig']->render('home.html.twig', array('all_clients' => $clients, 'all_stylists' => $stylists));
    });

  return $app;
?>
