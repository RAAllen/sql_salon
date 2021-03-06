<?php
  /**
  * @backupGlobals disabled
  * @backupStaticAttributes disabled
  */

  require_once 'src/Client.php';
  require_once 'src/Stylist.php';

  $server = 'mysql:host=localhost:8889; dbname=hair_salon_test';
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

    // function test_getStylistName()
    // {
    //   //Arrange
    //   $stylist_name = "Betty Braider";
    //   $new_stylist = new Stylist($stylist_name);
    //   $new_stylist->save();
    //   $stylist_id = $new_stylist->getId();
    //   $stylist_name = $new_stylist->getName();
    //
    //   $name = "Sally Splitends";
    //   $new_client = new Client($name, $stylist_id);
    //   $new_client->save();
    //
    //   $expected_output = $stylist_name;
    //   //Act
    //   $result = $new_client->getStylistName();
    //   //Assert
    //   $this->assertEquals($expected_output, $result);
    // }

    // function test_addStylist()
    // {
    //   //Arrange
    //   $client_name = "Nelly Needsacut";
    //   $test_client = new Client($client_name);
    //   $test_client->save();
    //
    //   $stylist_name = "Bob Bowlcutter";
    //   $test_stylist = new Stylist($stylist_name);
    //   $test_stylist->save();
    //   //Act
    //   $test_client->addStylist($test_stylist);
    //   //Assert
    //   $this->assertEquals([$test_stylist], $test_client->getStylist());
    // }

    function test_save()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        $test_client->save();
        //Act
        $result = Client::getAll();
        //Assert
        $this->assertEquals($test_client, $result[0]);
      }

    function test_updateName()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name = "Nelly Needsacut";
        $test_client = new Client($name, $stylist_id);
        $test_client->save();
        $new_name = "Cathy Curls";
        //Act
        $test_client->updateName($new_name);
        //Assert
        $this->assertEquals($new_name, $test_client->getName());
      }

    function test_delete()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name1 = "Nelly Needsacut";
        $name2 = "Fran Frayedends";
        $name3 = "Calvin Combover";
        $test_client1 = new Client($name1, $stylist_id);
        $test_client1->save();
        $test_client2 = new Client($name2, $stylist_id);
        $test_client2->save();
        $test_client3 = new Client($name3, $stylist_id);
        $test_client3->save();
        //Act
        $test_client2->delete();
        //Assert
        $this->assertEquals([$test_client1, $test_client3], Client::getAll());
      }

    function test_getAll()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name1 = "Nelly Needsacut";
        $name2 = "Fran Frayedends";
        $name3 = "Calvin Combover";
        $test_client1 = new Client($name1, $stylist_id);
        $test_client1->save();
        $test_client2 = new Client($name2, $stylist_id);
        $test_client2->save();
        $test_client3 = new Client($name3, $stylist_id);
        $test_client3->save();
        //Act
        $result = Client::getAll();
        //Assert
        $this->assertEquals([$test_client1, $test_client2, $test_client3], $result);
      }

    function test_deleteAll()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name1 = "Nelly Needsacut";
        $name2 = "Fran Frayedends";
        $name3 = "Calvin Combover";
        $test_client1 = new Client($name1, $stylist_id);
        $test_client1->save();
        $test_client2 = new Client($name2, $stylist_id);
        $test_client2->save();
        $test_client3 = new Client($name3, $stylist_id);
        $test_client3->save();
        //Act
        Client::deleteAll();
        $result = Client::getAll();

        //Assert
        $this->assertEquals([], $result);
      }

    function test_find()
      {
        //Arrange
        $name = "Bob Bowlcutter";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $stylist_id = $test_stylist->getId();

        $name1 = "Nelly Needsacut";
        $name2 = "Fran Frayedends";
        $name3 = "Calvin Combover";
        $test_client1 = new Client($name1, $stylist_id);
        $test_client1->save();
        $test_client2 = new Client($name2, $stylist_id);
        $test_client2->save();
        $test_client3 = new Client($name3, $stylist_id);
        $test_client3->save();
        //Act
        $result = Client::find($test_client2->getId());
        //Assert
        $this->assertEquals($test_client2, $result);
      }

  }
?>
