# F22_Database_Project - Library Database 
This project aims to replicate a databse like a library would have. This includes the typical catalog that a libray would have, books, movies, records etc, and also data on library card holders, library employees, and affiliated libraries.

The database tables are defined in the create tables file. The structure of the tables is currently under works, and more checking and constraints will be added in the future.

Records are inserted into the database in various files all nominaly beginning with the insert keyword followed by the type of records inserted into the databse (insert_movielist.sql)

We intend to create a series of useful queries typical users would want from the database. Queries are tailored for 3 types of users

1. A library card holder, who needs to do things like lookup an item to if it can be borrowed, see what they have borrowed currently, when an item is due to be returned. 
2. A library employee, who needs to check when an item is over due and assign appropriate fees, check the availability of an item, assess returned items for damage, see if another library has an item for an inter-library loan
3. A manager, who needs to be able to check addresses of employees, alter salaries.

Once we have the data in the database and working queries, we will build out a user interface that allows users to query the database and use the library databse as though it were a real database for a real in use library.


# To get the databse up and running:
1. Use create library tables file to create the database tables.
2. Then use the insert sql files in the following order

a. insert library movie tables sql file

b. insert audio sql

c. insert booklist sql

d. insert cardHolder & employee

In the furture these files will be merged for conveinance. 

There is also a sql file to clear out all records and drop the tables. This should not be necessary but is there in case any data is uploaded wrong and we need
to restart.

The example queries sql file shows some demo queries we will want to use in the frontend.

# Frontend
To run the php code you will need to use mamp or xxamp to set up a web server. Next import the sql tables to phpmyadmin. Next add php files to the map folder named hotdogs. Then in web browser use this link http://localhost:8888/login.php
