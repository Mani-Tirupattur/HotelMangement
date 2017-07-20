Hotel Booking:
>This app allows the users to book hotels online, they can check for the inforamtion of hotels which are available.
>If they want to book the room in advance they can do so by logging in and selecting the hotel.
>later they will be edirected to payment gateway which needs to be filled in order to confirm booking.

*Home:
	-this gives the images of the hotels which are available.

*Hotels
	-this gives the various hotels and their inforamtion, the services provided the rooms available etc
*Login:
	-this page allows you to either login or signup.
	- once user logs in he will be redirected to a page where he can select the hotel he wants to book room in.
	- once the room is selected he will be redirected to a payment page where he will be asked to enter his card details.
	-once this is done he will be assigned the room no.

---------------------------------------------------------------------------------------------------------------------
 Instalation:
1. the first step is to install chrome browser so that the pages can be run.
2.once the chrome broswer is installed download XAMP or WAMP server and install it.
3.once the installation is done run "localhost/phpmyadmin" in browser to check whether its installed correctly.
4.once this page opens there will be a option called databases, click it and create a new database.
5.Once database is created go to import option and import the "mani-2.sql" file which is a part of the RAR file.
6.later u need to enter the details of the database. goto "final\mani\includes", here u can find a file called db_connection.php
7.open that file with notepad++ and edit the database name and php username and password.
8.once this is done the web pages are ready to be launcehed.
9.copy the final folder to "c\wamp64\www" if ur using wamp server.
10.now goto chrome type "http://localhost/final/main" and the web page will be loaded.

----------------------------------------------------------------------------------------------------------------

Built with:
1.html
2.js
3.css
4.php
5.mysql
