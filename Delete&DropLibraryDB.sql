use libraryDB;
show tables;

#Get rid of triggers
drop trigger set_borrowed_bookloan;
drop trigger set_borrowed_audioloan;
drop trigger set_borrowed_movieloan;
drop trigger update_book_inventory;
drop trigger  update_audio_Inventory;
drop trigger  update_movie_Inventory;
drop trigger assign_fee_audio;
drop trigger assign_fee_movie;
drop trigger assign_fee_book;
drop trigger update_book_return_Inventory;
drop trigger update_audio_return_Inventory;
drop trigger update_movie_return_Inventory;
#show triggers

#Delete all data in tables

delete from bookLoan;
delete from audioLoan;
delete from movieLoan;
delete from audiolist;
delete from booklist;
delete from movielist;
delete from cardholder;
delete from employee;
delete from library;


#Destroy tables
#drop table returned;
drop table bookLoan;
drop table audioLoan;
drop table movieLoan;
drop table audiolist;
drop table booklist;
drop table movielist;
drop table cardholder;
drop table employee;
drop table library;



