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

  class StylistTest extends PHPUnit_Framework_TestCase
  {
    protected function tearDown()
    {
      Client::deleteAll();
      Stylist::deleteAll();
    }

    function test_getId()
      {
        //Arrange
        $id = 1;
        $name = "Harry Haircutter";
        $test_stylist = new Stylist($name, $id);
        //Act
        $result = $test_stylist->getId();
        //Assert
        $this->assertEquals($id, $result);
      }

    function test_getName()
      {
        //Arrange
        $name = "Harry Haircutter";
        $test_stylist = new Stylist($name);
        //Act
        $result = $test_stylist->getName();
        //Assert
        $this->assertEquals($name, $result);
      }

    function test_setName()
      {
        //Arrange
        $name = "Harry Haircutter";
        $test_stylist = new Stylist($name);
        $new_name = "Brenda Blowdry";
        //Act
        $test_stylist->setName($new_name);
        $result = $test_stylist->getName();
        //Assert
        $this->assertEquals($new_name, $result);
      }

    function test_save()
      {
        //Arrange
        $name = "Terry Trimmer";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        //Act
        $result = Stylist::getAll();
        //Assert
        $this->assertEquals($test_stylist, $result[0]);
      }

    function test_updateName()
      {
        //Arrange
        $name = "Terry Trimmer";
        $test_stylist = new Stylist($name);
        $test_stylist->save();
        $new_name = "Bruce Braider";
        //Act
        $test_stylist->updateName($new_name);
        
        //Assert
        $this->assertEquals($new_name, $test_stylist->getName());
      }

    function test_delete()
      {
        //Arrange
        $name1 = "Tanya Toweldry";
        $name2 = "Mary Manicure";
        $name3 = "Patty Perm";
        $test_stylist1 = new Stylist($name1);
        $test_stylist1->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();
        $test_stylist3 = new Stylist($name3);
        $test_stylist3->save();
        //Act
        $test_stylist2->delete();
        //Assert
        $this->assertEquals([$test_stylist1, $test_stylist3], Stylist::getAll());
      }

    function test_getAll()
      {
        //Arrange
        $name1 = "Tanya Toweldry";
        $name2 = "Mary Manicure";
        $name3 = "Patty Perm";
        $test_stylist1 = new Stylist($name1);
        $test_stylist1->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();
        $test_stylist3 = new Stylist($name3);
        $test_stylist3->save();
        //Act
        $result = Stylist::getAll();
        //Assert
        $this->assertEquals([$test_stylist1, $test_stylist2, $test_stylist3], $result);
      }

    function test_deleteAll()
      {
        //Arrange
        $name1 = "Tanya Toweldry";
        $name2 = "Mary Manicure";
        $name3 = "Patty Perm";
        $test_stylist1 = new Stylist($name1);
        $test_stylist1->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();
        $test_stylist3 = new Stylist($name3);
        $test_stylist3->save();
        //Act
        Stylist::deleteAll();
        $result = Stylist::getAll();
        //Assert
        $this->assertEquals([], $result);
      }

    function test_find()
      {
        //Arrange
        $name1 = "Tanya Toweldry";
        $name2 = "Mary Manicure";
        $name3 = "Patty Perm";
        $test_stylist1 = new Stylist($name1);
        $test_stylist1->save();
        $test_stylist2 = new Stylist($name2);
        $test_stylist2->save();
        $test_stylist3 = new Stylist($name3);
        $test_stylist3->save();
        //Act
        $result = Stylist::find($test_stylist2->getId());
        //Assert
        $this->assertEquals($test_stylist2, $result);
      }

    function test_getClients()
    {
      //Arrange
      $name1 = "Tanya Toweldry";
      $test_stylist1 = new Stylist($name1);
      $test_stylist1->save();
      $test_stylist1_id = $test_stylist1->getId();

      $name2 = "Mary Manicure";
      $test_stylist2 = new Stylist($name2);
      $test_stylist2->save();
      $test_stylist2_id = $test_stylist2->getId();

      $client1 = "Nelly Needsacut";
      $test_client1 = new Client($client1, $test_stylist1_id);
      $test_client1->save();

      $client2 = "Fran Frayedends";
      $test_client2 = new Client($client2, $test_stylist2_id);
      $test_client2->save();

      $client3 = "Calvin Combover";
      $test_client3 = new Client($client3, $test_stylist1_id);
      $test_client3->save();
      //Act
      $result = $test_stylist1->getClients();
      //Assert
      $this->assertEquals([$test_client1, $test_client3], $result);
    }
  }
?>
