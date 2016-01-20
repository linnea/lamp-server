load data infile 'lamp-server/data/movies-2014.csv'
into table movies
fields terminated by ','
optionally enclosed by '"'
ignore 1 lines
(title, released, distributor, genre, rating, gross, tickets, imdb_id)