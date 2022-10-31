use libraryDB;
show tables;

#Create the date an item must be returned back by
#Currently set to 3 weeks from the day it was borrowed
#TO change how long something may be borrowed, change the number after interval.
delimiter $$

create trigger set_borrowed  
before insert on onloan 
for each row
begin
if new.backBy is null then
    set new.backBy = date_add(sysdate(), interval 3 week);
end if;
end$$

#Can use to test that the above trigger works
#select * from onloan
#delete from onloan where transactionNum = 4 or transactionNum =3
#insert into onloan values ( 1, '111111111', 'Theory of Everything, The',1101111111111, default,default,default, default, default, default);
#insert into onloan values ( 1, '111111111', default,default, default,default,'ABBA','The Definitive Collection', default, default);
#select * from onloan

delimiter ;

#Update how much inventory is on hand after something has been borrowed
#Inventory may not drop below 0, as if there is 0 of something it cannot be borrowed
delimiter $$
create trigger update_book_inventory
after insert on onloan
for each row
begin
#Declare and set variables
declare bookNum varchar(30);
set bookNum = new.bookTitle;

#Check to see if a book was borrowed
#If so, change the number of copies of that
#book available in that library

if new.ISBN is not null then
    update booklist
    set num_copies = num_copies -1
    where isbn = new.isbn and housed_in = new.housed_in;
end if;

end$$

#Test if book trigger works. 
#select * from onloan;
#select title, isbn from booklist where housed_in =111111111;
#select num_copies from booklist where title = 'Slaughterhouse Five' and housed_in = '111111111';
#insert into onloan values (7, 111111111, 'Slaughterhouse Five',1111111111101, default, default, default,default, default, default);
#delete from onloan where bookTitle = 'SlaughterHouse Five'
delimiter ;


delimiter $$
create trigger update_movie_Inventory
after insert on onloan
for each row
begin

#Declare and set variables 
declare movName varchar(100);
declare movDate varchar(100);

set movName = new.movie_Title;
set movDate = new.movie_release;

#Check to see if a movie was borrowed
#If a movie was borrowed change the number of copies
#of that movie avaialble in that library
if ((new.movie_Title is not null) and (new.movie_release is not null)) then
    update movielist
    set num_copies = num_copies -1
    where title = new.movie_Title and release_date = new.movie_release and housed_in = new.housed_in;
end if;


end$$
delimiter ;

#Test if movie trigger works
#select * from onloan;
#select * from movielist where title = '27 Dresses';
#Originally 3 copies
#insert into onloan values(4,987654321, default, default, '27 Dresses',2008, default, default, default, default);
#After Insert 2 :)


#If someone borrows a record, update inventory of that record
delimiter $$
create trigger update_audio_Inventory
after insert on onloan
for each row
begin
#Create and set variables
declare artName varchar(100);
declare albName varchar(100);

set artName = new.artistName;
set albName = new.albumName;

#Check to see if a record was borrowed
#if so change the number of copies of that album
#available in that library
if (new.artistName is not null) and (new.albumName is not null) then
    update audiolist
    set num_copies = num_copies -1
    where artist = new.artistName and album = new.albumName and housed_in = new.housed_in;
end if;

end$$
delimiter ;

#select * from audiolist where album = 'The Low End Theory';
#select * from onloan;
#insert into onloan values( 4, 111111111,default,default,default,default,  'A Tribe Called Quest', 'The Low End Theory', default, default);
#BEfore insert 3 copies, after 2


delimiter ;

#After something has been cleared from the returned table we can add
#that inventory back to stock. 
delimiter $$
#drop trigger update_return_Inventory
create trigger update_book_return_Inventory
before delete
on onloan for each row
begin

#If a book was returned, add that book back to stock
if old.isbn is not null then
    update booklist
    set num_copies = num_copies +1
    where isbn = old.isbn and housed_in = old.housed_in;
end if;
end$$

#check the above trigger works
#select * from booklist;
#select num_copies, housed_in from booklist where title = 'Last Mughal, The';
#select * from onloan;
#insert  into onloan values(3, '123456789', 'Last Mughal, The', 1111011111111, default, default, default, default, default, default, default);
#delete from onloan where booktitle = 'Last Mughal, The'

delimiter $$
#After an item has been returned if an album was borrowed
#increment stock of that album
create trigger update_audio_return_Inventory
before delete
on onloan for each row
begin
#Create and set variables
declare artName varchar(100);
declare albName varchar(100);

set artName = old.artistName;
set albName = old.albumName;

#Check to see if a record was returned
#if so change the number of copies of that album
#available in that library
if (old.artistName is not null) and (old.albumName is not null) then
    update audiolist
    set num_copies = num_copies +1
    where artist = old.artistName and album = old.albumName and housed_in = old.housed_in;
end if;
end$$



delimiter $$
create trigger update_movie_return_Inventory
before delete
on onloan for each row
begin

#declare and set variables
#declare movName varchar(100);
#declare movDate varchar(100);
declare borrower int;
declare transNum int;
#declare library varchar(100);
set borrower = old.cardID;
set transNum = old.transactionNum;

#Check to see if a movie was borrowed
#If a movie was borrowed change the number of copies
#of that movie avaialble in that library

if (old.movie_Title is not null) and (old.movie_release is not null) then
    update movielist
    set num_copies = num_copies +1
    where title = old.movie_Title  and release_date = old.movie_release and housed_in =old.housed_in;
end if;

end$$


#Test if above trigger works
#select * from returned;
#select * from onloan;
#select * from movielist
#insert into onloan values(3, '987654321', default, default, '500 Days of Summer', 2009, default, default, default, default, default);
#select num_copies, housed_in from movielist where title = '500 Days of Summer';
#delete from onloan where movie_title = '500 Days of Summer'
#select num_copies, housed_in from movielist where title = '500 Days of Summer';

delimiter ;


delimiter $$
#add late fee penalty when a book has been returned after its
#due date
create trigger assign_fee
after update 
on onloan for each row
begin
#declare variables
declare backOn date;
declare borrower int;
#declare transNum int;

#set value of variables
#set transNum = new.transactionNum;
#set borrower = new.cardID;
if new.datereturned is not null then
    set backOn = new.dateReturned;
end if;

#Get the value when the item was due back
select backBy into @dueBy from onLoan
where cardID = new.cardID and transactionNum = new.transactionNum;

#If the day an item was returned is past the day it was due back on, assign a fee
if backOn > @dueBy then 
    update cardHolder
    set overdue = 1, fees = fees+15
    where cardID = new.cardid;
end if;

end$$

#Test if the above trigger works
#delete from returned where cardid = 3 and transactionNum = 7;
#delete from onloan where cardid =3 and backby = '2021-05-22';
#select * from onloan;
#insert into onloan values ( 3, '111111111', 'Theory of Everything, The',1101111111111, default,default,default, default, '2021-05-22', default);
#select * from returned;
#select * from cardholder where cardid =3;
#insert into returned values(3, '2022-10-04', 3);

