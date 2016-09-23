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

    function getStylistName()
    {

    }

    function setStylistId()
    {

    }

    function save()
    {

    }

    function getAll()
    {

    }

    function deleteAll()
    {

    }

    function find()
    {
      
    }
  }
?>
