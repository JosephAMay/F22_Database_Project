use libraryDB;
show tables;

#Create the date an item must be returned back by
#Currently set to 3 weeks from the day it was borrowed
#TO change how long something may be borrowed, change the number after interval.
#This trigger type will exist for all loan tables, book,movie, and audio
delimiter $$

create trigger set_borrowed_bookLoan
before insert on bookloan 
for each row
begin
if new.backBy is null then
    set new.backBy = date_add(sysdate(), interval 3 week);
end if;
end$$
delimiter;

delimiter $$
create trigger set_borrowed_movieLoan
before insert on movieloan 
for each row
begin
if new.backBy is null then
    set new.backBy = date_add(sysdate(), interval 3 week);
end if;
end$$
delimiter;

delimiter $$
create trigger set_borrowed_audioLoan
before insert on audioloan 
for each row
begin
if new.backBy is null then
    set new.backBy = date_add(sysdate(), interval 3 week);
end if;
end$$
delimiter;

#Update how much inventory is on hand after something has been borrowed
#Inventory may not drop below 0, as if there is 0 of something it cannot be borrowed
#This trigger exists for all loan tables, book, movie, audio
delimiter $$
create trigger update_book_inventory
after insert on bookloan
for each row
begin
#Check to see if a book was borrowed
#If so, change the number of copies of that
#book available in that library

if new.ISBN is not null then
    update booklist
    set num_copies = num_copies -1
    where isbn = new.isbn and housed_in = new.housed_in;
end if;

end$$
delimiter ;

delimiter $$
create trigger update_movie_Inventory
after insert on movieloan
for each row
begin

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

#If someone borrows a record, update inventory of that record
delimiter $$
create trigger update_audio_Inventory
after insert on audioloan
for each row
begin

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

#After something has been cleared from the returned table we can add
#that inventory back to stock. This exists for all loan tables book, movie, audio 
delimiter $$
#drop trigger update_return_Inventory
create trigger update_book_return_Inventory
before delete
on bookloan for each row
begin

#If a book was returned, add that book back to stock
if old.isbn is not null then
    update booklist
    set num_copies = num_copies +1
    where isbn = old.isbn and housed_in = old.housed_in;
end if;
end$$
delimiter ;

delimiter $$
#After an item has been returned if an album was borrowed
#increment stock of that album
create trigger update_audio_return_Inventory
before delete
on audioloan for each row
begin
#Check to see if a record was returned
#if so change the number of copies of that album
#available in that library
if (old.artistName is not null) and (old.albumName is not null) then
    update audiolist
    set num_copies = num_copies +1
    where artist = old.artistName and album = old.albumName and housed_in = old.housed_in;
end if;
end$$
delimiter;

delimiter $$
create trigger update_movie_return_Inventory
before delete
on movieloan for each row
begin

#Check to see if a movie was borrowed
#If a movie was borrowed change the number of copies
#of that movie avaialble in that library

if (old.movie_Title is not null) and (old.movie_release is not null) then
    update movielist
    set num_copies = num_copies +1
    where title = old.movie_Title  and release_date = old.movie_release and housed_in =old.housed_in;
end if;

end$$
delimiter ;


#add late fee penalty when a book has been returned after its
#due date this trigger exists for all loan tables, movie,book, audio
delimiter $$
create trigger assign_fee_book
after update 
on bookloan for each row
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
delimiter ;

delimiter $$
create trigger assign_fee_movie
after update 
on movieloan for each row
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
delimiter ;

delimiter $$
create trigger assign_fee_audio
after update 
on audioloan for each row
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
delimiter ;
