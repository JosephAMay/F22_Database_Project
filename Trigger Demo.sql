show databases;
use librarydb;
show tables;

#Bookloan 
#cardID          int not null,
#housed_in       char(9) not null,
#bookTitle       varchar(100) not null,
#ISBN            char(13) not null,
#backBy          date DEFAULT '2022-10-03' not null,
#transactionNum  int auto_increment,
#dateReturned    date default null,


#Notice the number of copies avaialbe right now
select * from booklist where title = 'Theory of Everything, The';

#Notice no value entered for due date.
insert into bookloan values(1, 123456789,'Theory of Everything, The', 1101111111111, default,  default, default);

#Notice the number of copies available for the book
select * from booklist where title = 'Theory of Everything, The';

#Notice the due date has been assigned automatically
select * from bookloan where cardid =1;

#Look at his overdue and fee status for our cardholder
select * from cardholder where cardId =1;

#If the item were to be returned after its due date
update bookloan set dateReturned = '2022-12-07' where cardID = 1;

#Look at cardholder now 
select * from cardholder where cardID =1;

#Remove item from the table
delete from bookloan where cardid =1;

#Notice the copy is returned
select * from booklist where title = 'Theory of Everything, The';

#Notice the user still has fees, just because the book is returned doesn't mean they 
#get to avoid the late fee
select * from cardholder where cardid =1;

