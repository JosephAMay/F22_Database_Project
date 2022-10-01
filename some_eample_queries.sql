use libraryDB;
show tables;

alter table booklist
drop primary key, add primary key (isbn, housed_in);

#Number of books in the libraries 
select count(*) as numBooks from booklist;


#Potential database function we want 

#See who has overdue books, highest fees first
select fname,lname,member_of,fees, overdue from cardholder 
where overdue > 0
group by fees;

#Notice Greg has no fees, but does have overdue status
select * from cardholder
where fname ='Greg';
#We want to have the DB eventually enforce some minimum
#fee when overdue is checked

#See who is a part of what library
select Fname,Lname, member_of from library join cardholder on member_of = libraryID;
#No one in the last library

#Most important table for constraints. Lots of bookkeeping, this will be a main
#focus for DB triggers and functions0
select * from onLoan;

#See how many genres are in the movielist
#libraries want a good catalog. Can look to see where to expand collection
select genre, count(*) from movielist
group by genre;


#Filter by some amount
select genre, count(*) from movielist
group by genre
having count(*) <= 3 ;


#See what libraries have movies
select locationname, count(*) as numMovies 
from movielist join library on housed_in = libraryid
group by housed_in;

#Some other useful things for library users
# but we get the point I think

#We want to have functions and triggers setup to make our 
#database useful, which is one of the next big phases in our
#project. Want to have a nice list of databse queries we can plug into 
#our frontend so users can look for items that they want.


#With that, its Onto Marcus with our front end

#how many movies from what studio
select studio,count(*) from movielist
group by studio;

#How much bob dylan do we have
select * from audiolist
where artist = 'Bob Dylan';

#artists with last name starting in D
select * from audiolist
where artist like '% D%';

