<?php
  class Client
  {
    private $name;
    private $stylist_id;
    private $id;

    function __construct($name, $stylist_id, $id=null)
    {
      $this->name = $name;
      $this->stylist_id = $stylist_id;
      $this->id =$id;
    }


    function getId()
    {
      return (int) $this->id;
    }

    function getName()
    {
      return $this->name;
    }

    function setName($new_name)
    {
      $this->name = (string) $new_name;
    }

    function getStylistId()
    {
      return (int) $this->stylist_id;
    }

    function setStylistId($new_stylist_id)
    {
      $this->stylist_id = (int) $new_stylist_id;
    }

    function getStylistName()
    {
      $stylist_from_db = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = {$this->getStylistId()};");
      $stylist = $stylist_from_db->fetch();
      $stylist_name = $stylist['name'];
      return $stylist_name;
    }

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
      $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
      $clients = array();
      foreach($returned_clients as $client)
      {
        $name = $client['name'];
        $id = $client['id'];
        $stylist_id = $client['stylist_id'];
        $new_client = new Client($name, $stylist_id, $id);
        $array_push($clients, $new_client);
      }
      return $clients;
    }

    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM clients;");
    }

    static function find($search_id)
    {
      $found_client = null;
      $clients = Client::getAll();
      foreach($clients as $client)
      {
        $client_id = $client->getId();
        if ($task_id == $search_id)
        {
          $found_client = $client;
        }
      }
      return $found_task;
    }
  }
?>
