
# _SQL Salon_

#### _This is an application that will allow a salon owner to keep track of their stylists and clients. Specifically it will allow them to track which clients see which stylists.  September 23, 2016_

#### By _**Rebecca Allen**_

## Setup/Installation requirements

* _In order to utilize this project you will need a terminal application such as Terminal or Bash, a web browser such as Chrome or Firefox, PHP, MAMP, MySQL and the Composer application installed on your computer. If you want to additionally edit this program, you must have a text editor application such as Atom._
* _Start by opening the terminal and typing the command "git clone https://github.com/RAAllen/sql_salon.git" after navigating with the "cd" command to the location you would like the project to be cloned in to._
* _In the terminal application navigate to the project folder using the "cd" command, then type the command "composer install"._
* _Next navigate to the web folder using the "cd" command._
* _Sign in to the MySQL shell by typing "/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot"._
* _Launch the MAMP program and start its server, making sure the document root is set to the project folder in the Preferences>Web Server._
* _Then launch a local server from within the web folder of the project directory using the "php -S localhost:8000" command. If you are already running a localhost you should simply alter the number 8000 to something like 8001._
* _Next switch to your web browser and navigate to the server localhost:8000 you just created. The program should now launch._


## Program Specifications

* _The program will allow users to input and save a single stylist._
* Example Stylist Input: Harry Haircutter.
* Example Output: Stylists: Harry Haircutter.
* _The program will allow users to input and save multiple stylists._
* Example Stylist Input: Harry Haircutter.
* Example Stylist Input: Bridget Buzzcut.
* Example Output: Stylists: Harry Haircutter, Bridget Buzzcut.
* _The program will allow users to input and save a single client._
* Example Client Input: Ned Needsatrim.
* Example Output: Clients: Ned Needsatrim.
* _The program will allow users to input and save multiple clients._
* Example Client Input: Ned Needsatrim.
* Example Client Input: Debra Dyejob.
* Example Output: Clients: Ned Needsatrim, Debra Dyejob.
* _The program will allow users to match a client to a stylist._
* Example Client: Ned Needsatrim.
* Example Stylist: Bridget Buzzcut.
* Example Output: Bridget Buzzcut's Clients: Ned Needsatrim.
* _The program will allow users to match multiple clients to a stylist._
* Example Client: Debra Dyejob.
* Example Client: Michael Mophead.
* Example Stylist: Harry Haircutter.
* Example Output: Harry Haircutter's Clients: Debra Dyejob, Michael Mophead.



## Support and Contact Details

_Please contact RebeccaZarsky@gmail.com for technical questions or assistance running the program_

## Technologies Used

_This program utilizes HTML, CSS, PHP, MySQL, PHPUnit, Twig, Composer and Bootstrap_

## License

*This program is licensed under the MIT license*

Copyright (c) 2016 **_Rebecca Allen_**
