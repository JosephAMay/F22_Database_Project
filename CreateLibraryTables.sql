create database libraryDB;
show databases;
use libraryDB;
show tables;

create table library
(
	Locationname		VARCHAR(100)	NOT NULL,
    address				VARCHAR(100) NOT NULL,
    libraryID			Char(9) NOT NULL,
    membershipFee		Decimal(10,2) default 0 check(membershipFee >=0),
	PRIMARY KEY(libraryID)

);

#alter table booklist
#drop column pub_date;

create table booklist
(
	Auth_Fname 		varchar (100), 
    Auth_Lname 		varchar (100), 
	publisher		varchar (100) NOT NULL,
	title			varchar(100) NOT NULL,
	num_copies      int NOT NULL check(num_copies >= 0),
	housed_in		char(9) NOT NULL,
	ISBN			char(13) NOT NULL,
	genre			varchar(100),
	sub_genre		varchar(100) default 'N/A',
    
    primary key(ISBN, housed_in),
    foreign Key(housed_in) references library(libraryID)
);
create table movielist
(
	title			varchar(100) not null,
	genre           varchar(100),
    studio			varchar(100),
	rating			float(10,2) check(rating >= 0),
	profit			float(10,2),
    release_date	char(4) not null,
    housed_in		char(9) not null,
    num_copies      int not null check(num_copies >=0),
    primary key(title, release_date),
    foreign key(housed_in) references library(libraryID)
);

create table audiolist
(
	release_date	date not null,
	album			varchar(100),
	artist			varchar(100) not null,
	genre			varchar(100),
	sub_genre		varchar(100),
    housed_in		char(9) not null,
    num_copies		int not null check(num_copies >=0),
    primary key (artist, album),
    foreign key(housed_in) references library(libraryID)
);

create table cardholder
(
	 Fname			varchar(20) not null,	
	 Lname			varchar(20) not null,	
	 cardID			int AUTO_INCREMENT,
	 signup_date	date DEFAULT '2022-10-03',
	 overdue		char(1) not null default 0,
	 fees			decimal(10,2) default 0 check (fees >=0),
	 address		varchar(30) not null,
	 member_of		char(9) not null,
     username      varchar(30) default null,
     password       varchar(20) default null,
     
	primary key (cardID),
    foreign key(member_of) references library(libraryID)
);
alter table cardholder auto_increment = 0;
create table employee
(
	Fname			varchar(25) not null,
    Lname			varchar(25) not null,
    Minit			char(1),
    salary			decimal(10,2) check(salary >= 0 and salary <=250000),
    managed_by		char(9) not null,
    ssn				char(9) not null,
    home_address	varchar(35) not null,
    workLocation	char(9) not null,
    username      varchar(30) default null,
     password       varchar(20) default null,
    
    
    primary key (ssn),
    foreign key (workLocation) references library(libraryID)
    
);
create table onloan
(
    cardID          int,
    housed_in       char(9) not null,
    bookTitle       varchar(100) default null,
    ISBN            char(13) default null,
    movie_Title     varchar(100) default null,
    movie_release   char(4) default null,
    artistName      varchar(100) default null,
    albumName       varchar(100) default null,
	backBy          date DEFAULT '2022-10-03',
    transactionNum  int auto_increment not null,
    
    primary key(transactionNum, cardID),
    foreign key(cardID) references cardholder(cardID),
    foreign key (housed_in) references library(libraryID),
    foreign key(movie_Title, movie_release) references movielist(title, release_date),
    foreign key(artistName) references audiolist(artist),
    foreign key (ISBN) references booklist(ISBN)
);
create table returned
(
	cardID				int,
    date_Returned		date not null,
	transactionNum		int not null,
    
    primary key(cardID, transactionNum),
    foreign key(cardID) references cardholder(cardID),
    foreign key(transactionNum) references onloan(transactionNum)
);


#check when return date is past current date, add fee to cardholder, set  overdue to 1

#If all tems that are  overdue are returned, set overdue to 0 for cardholder

#make salary of employee less than manager

#when a book is removed from returned, add to num copies of that item in library it belongs

#If item in onLoan for an item that has 0 num copies, abort transaction

#On update, on delete? 
