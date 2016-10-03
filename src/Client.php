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
      return $this->stylist_id;
    }

    function setStylistId($new_stylist_id)
    {
      $this->stylist_id = (int) $new_stylist_id;
    }

    // function getStylistName()
    // {
    //   $returned_stylists = $GLOBALS['DB']->query("SELECT  stylists.* FROM clients
    //     JOIN stylists ON (stylists.id = clients.stylist_id)
    //     JOIN clients ON (clients.stylist_id = stylist.id)
    //     WHERE clients.stylist_id = {$this->getStylistId()};");
    //   $stylists = array();
    //   foreach ($returned_stylists as $stylist)
    //   {
    //     $id = $stylist['id'];
    //     $name = $stylist['name'];
    //     $new_stylist = new Stylist($name, $id);
    //     array_push($authors, $new_stylist);
    //   }
    //   return $stylist->name;
    // }

    // function addStylist($new_stylist)
    // {
    //   $GLOBALS['DB']->exec("INSERT INTO clients (stylist_id) VALUES ({$new_stylist->getId()}");
    // }

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    function updateName($new_name)
    {
      $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
      $this->setName($new_name);
    }

    // function updateStylist($new_stylist_id)
    // {
    //   $GLOBALS['DB']->exec("UPDATE clients SET stylist_id = '{$new_id}' WHERE ")
    // }

    function delete()
    {
      $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
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
        array_push($clients, $new_client);
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
        if ($client_id == $search_id)
        {
          $found_client = $client;
        }
      }
      return $found_client;
    }
  }
?>
