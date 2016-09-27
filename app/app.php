<?php

  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Client.php';
  require_once __DIR__.'/../src/Stylist.php';
  date_default_timezone_set('America/New_York');

  $app = new Silex\Application();

  $server = 'mysql:host=localhost:8889;dbname=hair_salon';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  // $app->get("/", function() use ($app)
  //   {
  //     return $app['twig']->render('home.html.twig');
  //   });

  // $app->post("/results", function() use ($app)
  // {
  //   $client_name = $_POST['user-client'];
  //   $new_client = new Client($client_name);
  //   $new_client->save();
  // });

  return $app;
?>
