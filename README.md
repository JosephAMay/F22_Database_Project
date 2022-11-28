# F22_Database_Project - Library Database 
This project aims to replicate a databse like a library would have. This includes the typical catalog that a libray would have, books, movies, records etc, and also data on library card holders, library employees, and affiliated libraries.

# Database Tables
The database tables are defined in the create tables file. The structure of the tables is was designed to be generally adaptable to any library. We provided 3 catalog tables in the form of a book, movie, and record table. Each catalog table has a corresponding loan table, so book table has a bookloan table that records books that have been loaned, and it is the same for movie and record. We also have an employee table which captures standard employee data, a library table which holds library 
information like the name of the library. We have a uml file in the github you can browse to examine all our tables and how they connect to one another. 

# Data Insertion
Records are inserted into the database in various files all nominaly beginning with the insert keyword followed by the type of records inserted into the databse (insert_movielist.sql). There is a file called insert all data, which populates the database completely with sample data of different libraries, employees, books, movies, and records. There is no loan information inserted in the insert all data file. This was intentaional so that anyone sampling our work could play around and insert their own values, and get a feel for how our triggers work and see what they would like to change for their own library dtabase.


# Triggers 
We have a series of triggers defined in the library tigger definition file. There are broadly 4 types of triggers, but each trigger is defined multiple times and associated with a database table. There is a trigger that will assign a preset fee of $15 to an account when an item is returned after its due date. There is a trigger that will reduce the number of inventory when an item is borrowed. So if someone borrows a copy of The Cat in the Hat, the library used to have 5 copies, but now that a copy is loaned out the databse will recognize that there are only 4 available copies to be borrowed. Similarily, there is a trigger which will return an item to the shelves. So when that copy of Cat in the Hat is returned, the available copies in the libraries will go up by one. Lastly there is a trigger that will set the return date of an item to 3 weeks from the current date if not date is specified when inserting into a loan table.

# Using our code
1. Use create library tables file to create the database tables.
2. Use the library trigger definitions file to define all library triggers
3. Then use the insert all data sql file to populate the database
4. You can use the some example queries file to do some basic testing of the datbase and see some of the functionality we want bundled into our front ends. 
5. If there are any issues you can use parts or all of the delete and drop library db file to clear out data, drop tables, and remove triggers.


# Front End
As we were working we split front end devlopment into two teams, a user team and an employee team. 

# Establishing a connection
To run the php code you will need to use mamp or xxamp to set up a web server. Next import the sql tables to phpmyadmin. Next add php files to the map folder named hotdogs. Then in web browser use this link http://localhost:8888/login.php


# User Front End

# Employee Front End
