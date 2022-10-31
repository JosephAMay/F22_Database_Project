use libraryDB;
show tables;

#Get rid of triggers
drop trigger set_borrowed;
drop trigger update_book_inventory;
drop trigger  update_audio_Inventory;
drop trigger  update_movie_Inventory;
drop trigger update_book_return_Inventory;
drop trigger update_audio_return_Inventory;
drop trigger update_movie_return_Inventory;
drop trigger assign_fee;

#Delete all data in tables
#delete from returned;
delete from onloan;
delete from audiolist;
delete from booklist;
delete from movielist;
delete from cardholder;
delete from employee;
delete from library;


#Destroy tables
#drop table returned;
drop table onloan;
drop table audiolist;
drop table booklist;
drop table movielist;
drop table cardholder;
drop table employee;
drop table library;



