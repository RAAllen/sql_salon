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
      return $app['twig']->render('clients.html.twig', array('clients' => Client::getAll()));
    });

  $app->get("/stylists", function() use ($app)
    {
      return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

  $app->post("/added_client", function() use ($app)
  {
    $new_client = new Client($_POST['add-client']);
    $new_client->save();
    if ($_POST['new_stylist'] != '')
    {
      $new_stylist = new Stylist($_POST['new_stylist']);
      $new_stylist->save();
      $new_client->setStylistId($new_stylist);
    }
    if ($_POST['stylist_id'] != "0")
    {
      $stylist = Stylist::find($_POST['stylist_id']);
      $new_client->addStylist($stylist);
    }
    return $app['twig']->render('clients.html.twig', array('clients' =>Client::getAll()));
  });

  $app->post("/added_stylist", function() use ($app)
  {
    $new_stylist = new Stylist($_POST['add-stylist']);
    $new_stylist->save();
    return $app['twig']->render('stylists.html.twig', array('stylists' =>Stylist::getAll()));
  });

  $app->get("/edit_client/{id}", function($id) use ($app)
  {
    return $app['twig']->render('edit_client.html.twig', array('clients' => Client::find($id), 'stylists' => Stylist::getAll()));
  });

  $app->get("/edit_stylist/{id}", function($id) use ($app)
  {
    return $app['twig']->render('edit_stylist.html.twig', array('stylists' => Stylist::find($id), 'clients' => Client::getAll()));
  });

  $app->patch("/edited_client", function($id) use ($app)
  {
    $client = Client::find($id);
    $client->updateName($_POST['new_name']);
    return $app['twig']->render('clients.html.twig', array('clients' => Client::getAll()));
  });

  $app->patch("/edited_stylist", function() use ($app)
  {
    $stylist = Stylist::find($id);
    $stylist->updateName($_POST['new_name']);
    return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
  });

  return $app;
?>
