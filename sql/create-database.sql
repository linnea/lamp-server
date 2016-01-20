create database movies;

create table movies (
	id int not null auto_increment primary key,
    title varchar(100),    
    released date,
    distributor varchar(64), 
    genre varchar(64),
    rating varchar(10),
    gross int, 
    tickets int,
    imdb_id varchar(10),
    index(id)
);

use movies;
