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

  use Symfony\Component\HttpFoundation\Request;
  Request::enableHttpMethodParameterOverride();

  $app->get("/", function() use ($app)
    {
      return $app['twig']->render('home.html.twig');
    });

  $app->get("/clients", function() use ($app)
    {
      return $app['twig']->render('clients.html.twig', array('clients' => Client::getAll(), 'stylists' => Stylist::getAll()));
    });

  $app->get("/stylists", function() use ($app)
    {
      return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

  $app->post("/added_client", function() use ($app)
  {
    $new_client = new Client($_POST(['name'], ['stylist_id']));
    $new_client->save();
    return $app['twig']->render('clients.html.twig', array('clients' =>Client::getAll()));
  });

  $app->post("/added_stylist", function() use ($app)
  {
    $new_stylist = new Stylist($_POST['name']);
    $new_stylist->save();
    return $app['twig']->render('stylists.html.twig', array('stylists' =>Stylist::getAll()));
  });

  $app->patch("/edited_client/{id}", function() use ($app)
  {
    $client = Client::find($id);
    $client->updateName($_POST['new_name']);
    return $app['twig']->render('clients.html.twig', array('clients' => Client::getAll()));
  });

  $app->patch("/edited_stylist/{id}", function() use ($app)
  {
    $stylist = Stylist::find($id);
    $stylist->updateName($_POST['new_name']);
    return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
  });

  return $app;
?>
