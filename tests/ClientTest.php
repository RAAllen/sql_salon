<?php
  /**
  *@backupGlobals disabled
  *backupStaticAttributes disabled
  */

  require_once 'src/Client.php';
  require_once 'src/Stylist.php';

  $server = 'mysql:host=localhost; db-name=salon_test_db';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  class ClientTest extends PHPUnit_Framework_TestCase
  {
    protected function tearDown()
    {
      Client::deleteAll();
      Stylist::deleteAll();
    }

    function test_getId()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $id = 1;
        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id, $id);
        //Act
        $result = $test_client->getId();
        //Assert
        $this->assertEquals($id, $result);
      }

    function test_getName()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        //Act
        $result = $test_client->getName();
        //Assert
        $this->assertEquals($name, $result);
      }

    function test_setName()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        $new_name = "Layla Longhair";
        //Act
        $test_client->setName($new_name);
        $result = $test_client->getName();
        //Assert
        $this->assertEquals($new_name, $result);
      }

    function test_getStylistId()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        //Act
        $result = $test_client->getStylistId();
        //Assert
        $this->assertEquals($stylist_id, $result);
      }

    function test_setStylistId()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        //Act
        $result = $test_client->getStylistId();
        //Assert
        $this->assertEquals($stylist_id, $result);
      }

    function test_save()
      {
        //Arrange

        //Act

        //Assert

      }

    function test_getAll()
      {
        //Arrange

        //Act

        //Assert

      }

    function test_deleteAll()
      {
        //Arrange

        //Act

        //Assert

      }

    function test_find()
      {
        //Arrange

        //Act

        //Assert

      }

  }
?>
