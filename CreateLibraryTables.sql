create database libraryDB;
show databases;
use libraryDB;
show tables;

create table library
(
	Locationname		VARCHAR(50)	NOT NULL,
    address				VARCHAR(50) NOT NULL,
    libraryID			Char(9) NOT NULL,
    membershipFee		Decimal(10,2),
	PRIMARY KEY(libraryID)

);
create table booklist
(
	Auth_Fname 		varchar (20), 
    Auth_Lname 		varchar (20), 
	pub_date 		date Not null,
	publisher		varchar (35) NOT NULL,
	title			varchar(50) NOT NULL,
	num_copies      int NOT NULL,
	housed_in		char(9) NOT NULL,
	ISBN			char(13) NOT NULL,
	genre			varchar(20),
	sub_genre		varchar(20),
    
    primary key(ISBN),
    foreign Key(housed_in) references library(libraryID)
);
create table movielist
(
	title			varchar(50) not null,
	genre           varchar(30),
    studio			varchar(30),
	rating			float(10,2),
	profit			float(10,2),
    release_date	char(4) not null,
    housed_in		char(9) not null,
    num_copies      int not null,
    primary key(title, release_date),
    foreign key(housed_in) references library(libraryID)
);
create table audiolist
(
	release_date	date not null,
	album			varchar(60),
	artist			varchar(60) not null,
	genre			varchar(60),
	sub_genre		varchar(60),
    housed_in		char(9) not null,
    num_copies		int not null,
    primary key (artist, album),
    foreign key(housed_in) references library(libraryID)
);
create table cardholder
(
	 Fname			varchar(20) not null,	
	 Lname			varchar(20) not null,	
	 cardID			char(5) not null,
	 signup_date	date,
	 overdue		char(1) not null,
	 fees			decimal(10,2),
	 address		varchar(30) not null,
	 member_of		char(9) not null,
     
	primary key (cardID),
    foreign key(member_of) references library(libraryID)
);
create table employee
(
	Fname			varchar(25) not null,
    Lname			varchar(25) not null,
    Minit			char(1),
    salary			decimal(10,2),
    managed_by		char(9) not null,
    ssn				char(9) not null,
    home_address	varchar(35) not null,
    workLocation	char(9) not null,
    
    primary key (ssn),
    foreign key (workLocation) references library(libraryID)
);
create table onloan
(
    cardID          char(5) not null,
    housed_in       char(9) not null,
    bookTitle       varchar(50),
    ISBN            char(13),
    movie_Title     varchar(30),
    movie_release   char(4),
    artistName      varchar(30),
    albumName       varchar(20),
	backBy          date,
    transactionNum  char(10) not null,
    
    primary key(transactionNum, cardID),
    foreign key(cardID) references cardholder(cardID),
    foreign key (housed_in) references library(libraryID),
    foreign key(movie_Title, movie_release) references movielist(title, release_date),
    foreign key(artistName) references audiolist(artist),
    foreign key (ISBN) references booklist(ISBN)
);
create table returned
(
	cardID				char(5) not null,
    date_Returned		date not null,
	transactionNum		char(12) not null,
    
    primary key(cardID, transactionNum),
    foreign key(cardID) references cardholder(cardID),
    foreign key(transactionNum) references onloan(transactionNum)
);
