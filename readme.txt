[![Alt text](https://img.youtube.com/vi/VID/0.jpg)](https://www.youtube.com/watch?v=VID)







Web Programming - 344
Prof - Shimin Li
Individual Final Project

I created a multi-page website that included a login/account creation, navigation bar, and hashed passwords stored in a SQL database.  This website was created to allow a user enter their nightly sleep and it would be recorded in a database.



       Final Project --- Spencer Williams-Waldemar --- 8/6/20
             
////////////////    IMPORTANT   /////////////////////////
2: The 'dbh.inc.php' file has the server configeration setting
   create your own database, user and password and configure your own webserver.
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


3: the some files contain several "FUTURE WORK" comments. I plan on doing more with the project 
   for my portfolio after this class but did not have time to implement everything that I planned
   and did not want to delete my progress. I did not get to the following goals:
   -- take data and display the users sleep patterns on a line graph 
   -- have an account page where a user can access their information in the database and change settings
   -- style the pages in a more user friendly way


                FUNCTIONS & FEATURES


1: The login.php file allows the user to either login or register under the database
                        login.php helper files
    - dbh.inc.php ---> connects to database
    - login.inc.php ---> takes login input and verifies information with database
    - signup.inc.php ---> takes registration input, checks for errors, hashes password and is placed in database
    - loginstyle.css ---> styles the login page
    - script.js ---> toggles the login/registration button and the respective input fields

2: The home.php file is a landing page after log in and directs a user
                        home.php helper files
    - home.css ---> styles the home page
    - sidebar.css ---> styles the side bar

3: The submittion.php file is for submitting a new sleep entry to the database
                        home.php helper files
    - dbh.inc.php ---> connects to the database
    - submission.inc.php ---> takes the users input for the date and sleep duration and sends to the database
    - home.css ---> styles the submission page
    - sidebar.css ---> styles the side bar

4: The history.php file is for viewing all sleep entries for the user that is logged in
                        home.php helper files
    - dbh.inc.php ---> connects to the database
    - history.inc.php ---> takes the users information stored in the database and displays it in a table
    - history.css ---> styles the history page
    - sidebar.css ---> styles the side bar



                REFERNCES AND DOCUMENTATIONS

through out the project I used many resources to help solve problems with this project everything in this project I did from 
scratch but that came with a lot of help from online resources to explain how everything works.
-- w3schools
-- reddit
-- stack overflow
-- geeksforgeeks.org
-- PHP.net
-- fontawesome.com -- free icons
-- unsplash.com -- free images
were all some very helpful websites that I was constantly learning from



