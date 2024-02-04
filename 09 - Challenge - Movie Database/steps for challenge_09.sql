CREATE DATABASE movie_industry;


CREATE TABLE actors (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(32), 
    last_name VARCHAR(32),
    nickname VARCHAR(32),
    date_of_birth DATE,
    agent_code INT
);

INSERT INTO actors (first_name, last_name, nickname, date_of_birth, agent_code)
VALUES 
    ('Morgan', 'Freeman', 'Morgan', '1937-06-01', 1),
    ('Robin', 'Williams', 'Robin', '1951-07-21', 2),
    ('Denzel', 'Washington', 'Denzel', '1954-12-28', 3),
    ('Keanu', 'Reeves', 'Keanu', '1964-09-02', 4),
    ('Tom', 'Hanks', 'Tom', '1956-07-09', 3),
    ('Harrison', 'Ford', 'Harry', '1942-07-13', 2),
    ('Julia', 'Roberts', 'Julia', '1967-10-28', 5),
    ('Anthony', 'Hopkins', 'Toni', '1937-12-31', 1),
    ('Jack', 'Nicholson', 'Jack', '1937-04-22', 2),
    ('Dwayne', 'Johnson', 'The Rock', '1972-05-02', 3);

-- ------------------------------

CREATE TABLE movies (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    movie_name VARCHAR(100), 
    premiere INT,
    genre VARCHAR(16),
    country_of_origin VARCHAR(64),
    production_name VARCHAR(64),
    movie_type VARCHAR(16)
);

INSERT INTO movies(movie_name, premiere, genre, country_of_origin, production_name, movie_type)
VALUES
('The Shawshank Redemption', 1994, 'Drama', 'USA', 'Castle Rock Entertainment', 'film'),
('The Godfather', 1972, 'Crime', 'Italy', 'Universal Pictures', 'film'),
('The Dark Knight', 2008, 'Crime', 'USA', 'Warner Bros', 'film'),
('The Godfather Part II', 1974, 'Drama', 'Italy', 'Universal Pictures', 'film'),
('The Lord of the Rings: The Two Towers', 2002, 'Adventure', 'USA', 'Marvel Studios', 'film'),
('Pulp Fiction', 1994, 'Crime', 'USA', 'Paramount Pictures', 'film'),
('The Lord of the Rings: The Fellowship of the Ring', 2001, 'Adventure', 'USA', 'Columbia Pictures', 'film'),
('Forrest Gump', 1994, 'Romance', 'Germany', 'Warner Bros', 'film'),
('Fight Club', 1994, 'Drama', 'USA', 'Marvel Studios', 'film'),
('Top Gun: Maverick', 2022, 'War', 'USA', 'Universal Pictures', 'film'),
('Breaking Bad', 2008, 'Thriller', 'USA', 'Marvel Studios', 'tv-series'),
('Chernobyl', 2019, 'History', 'Ukraine', 'Paramount Pictures', 'tv-series'),
('The Wire', 2002, 'Crime', 'USA', 'Columbia Pictures', 'tv-series'),
('The Soppranos', 1999, 'Crime', 'USA', 'Warner Bros', 'tv-series'),
('Game of Thrones', 2011, 'Adventure', 'USA', 'Marvel Studios', 'tv-series'),
('The Last of Us', 2023, 'Sci-Fi', 'USA', 'Universal Pictures', 'tv-series'),
('Sherlock', 2010, 'Mystery', 'USA', 'Universal Pictures', 'tv-series'),
('The Office', 2005, 'Comedy', 'USA', 'Warner Bros', 'tv-series'),
('Dark', 2017, 'Sci-Fi', 'Germany', 'Universal Pictures', 'tv-series'),
('The Mandalorian', 2019, 'Sci-Fi', 'USA', 'Warner Bros', 'tv-series');

-- ------------------------------

CREATE TABLE directors (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(32),
    last_name VARCHAR(32),
    genre VARCHAR(16),
    expertise VARCHAR(64)
);

INSERT INTO directors (first_name, last_name, genre, expertise)
VALUES
('Tim', 'Burton', 'Drama', 'Originality'),
('Christopher', 'Nolan', 'Crime', 'Taking Initiative'),
('Steven', 'Spielberg', 'Drama', 'Leadership'),
('Quentin', 'Tarantino', 'Action', 'Criminal Movies'),
('David', 'Fincher', 'Sci-fi', 'Ambition');

-- ------------------------------

CREATE TABLE films (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    movie_id INT UNIQUE,
    director_id INT,
    director_income INT,
    city_premiere VARCHAR(32),
    first_week_income INT,
    premiere_format VARCHAR(10),
    CONSTRAINT FOREIGN KEY(movie_id) REFERENCES movies(id),
    CONSTRAINT FOREIGN KEY(director_id) REFERENCES directors(id)
);

INSERT INTO films (movie_id, director_id, director_income, city_premiere, first_week_income, premiere_format)
VALUES 
(1, 1, 20000, 'Los Angeles', 540000, '2D'),
(2, 2, 25000, 'Berlin', 870000, '2D'),
(3, 2, 45000, 'Skopje', 458000, '2D'),
(4, 3, 50000, 'Las Vegas', 604000, '3D'),
(5, 4, 15000, 'New York', 580000, '3D'),
(6, 5, 32500, 'Boston', 445000, '2D'),
(7, 5, 45200, 'Belgrade', 354000, '2D'),
(8, 4, 47200, 'New York', 748000, '3D'),
(9, 1, 25000, 'Rome', 555000, '3D'),
(10, 2, 31500, 'Milan', 490000, '2D');

-- ------------------------------

CREATE TABLE film_sequels (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    film_id INT,
    sequel_film_id INT,
    CONSTRAINT FOREIGN KEY(film_id) REFERENCES films(id),
    CONSTRAINT FOREIGN KEY(sequel_film_id) REFERENCES films(id)
);

INSERT INTO film_sequels (film_id, sequel_film_id)
VALUES 
(2, 4),
(7, 5),
(7, 3),
(5, 3),
(8, 9);

-- ------------------------------

CREATE TABLE tv_series (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    movie_id INT UNIQUE,
    aired_channel VARCHAR(32),
    number_of_episodes INT,
    number_of_expected_seasons INT,
    CONSTRAINT FOREIGN KEY(movie_id) REFERENCES movies(id)
);

INSERT INTO tv_series (movie_id, aired_channel, number_of_episodes, number_of_expected_seasons)
VALUES 
(11, 'HBO', 24, 4),
(12, 'SHOWTIME', 12, 6),
(13, 'STARZ', 10, 4),
(14, 'CINEMAX', 8, 4),
(15, 'STARZ', 18, 12),
(16, 'TMC', 6, 10),
(17, 'CINEMAX', 12, 8),
(18, 'TMC', 6, 5),
(19, 'SHOWTIME', 10, 5),
(20, 'MGM', 8, 8);

-- ------------------------------

CREATE TABLE actor_tv_series (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    actor_id INT,
    tv_series_id INT,
    salary INT, 
    CONSTRAINT FOREIGN KEY(actor_id) REFERENCES actors(id),
    CONSTRAINT FOREIGN KEY(tv_series_id) REFERENCES tv_series(id)
);

INSERT INTO actor_tv_series (actor_id, tv_series_id, salary)
VALUES 
(9, 3, 159000),
(5, 4, 419000),
(5, 6, 356000),
(7, 2, 378000),
(7, 1, 181000),
(9, 10, 170000),
(4, 7, 380000),
(2, 5, 410000),
(6, 4, 335000),
(10, 5, 325000),
(9, 8, 447000),
(2, 2, 428000),
(10, 5, 301000),
(2, 9, 247000),
(5, 2, 172000);

-- ------------------------------

CREATE TABLE actor_films (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    actor_id INT,
    film_id INT,
    salary INT, 
    CONSTRAINT FOREIGN KEY(actor_id) REFERENCES actors(id),
    CONSTRAINT FOREIGN KEY(film_id) REFERENCES films(id)
);

INSERT INTO actor_films (actor_id, film_id, salary)
VALUES 
(5, 3, 276000),
(4, 5, 364000),
(8, 8, 243000),
(6, 10, 392000),
(7, 2, 187000),
(10, 1, 199000),
(4, 3, 429000),
(4, 4, 421000),
(1, 10, 391000),
(8, 2, 447000),
(4, 3, 310000),
(3, 7, 423000),
(6, 6, 202000),
(3, 7, 155000),
(10, 8, 362000),
(5, 9, 366000),
(4, 9, 463000);

-- ------------------------------

CREATE TABLE oscar_winners (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    actor_films_id INT UNIQUE,
    year_of_award INT,
    actor_role VARCHAR(32), 
    CONSTRAINT FOREIGN KEY(actor_films_id) REFERENCES actor_films(id)
);

INSERT INTO oscar_winners (actor_films_id, year_of_award, actor_role)
VALUES 
(2, 2018, 'Best Actor'),
(3, 2019, 'Best Supporting Role'),
(12, 2020, 'Best Actor'),
(8, 2021, 'Best Lead Role'),
(9, 2022, 'Best Actor');

-- ------------------------------

CREATE TABLE critics (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(32),
    last_name VARCHAR(32),
    password VARCHAR(64),
    username VARCHAR(64)
);

INSERT INTO critics (first_name, last_name, password, username)
VALUES 
('Maya', 'Patel', 'Xn8#pK6s@!m', 'mayapatel94'),
('Liam', 'Johnson', 'qW3$eR9tY2u', 'liamjohnson21'),
('Emily', 'Lee', 'Ht2#sR6g@iJ', 'emilylee87'),
('Lucas', 'Brown', 'Lp5!oK8b$eF', 'lucasbrown72'),
('Ava', 'Nguyen', 'Zm4@xN7c#fT', 'avanguyen63');

-- ------------------------------

CREATE TABLE actor_critics (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    actor_films_id INT,
    critic_id INT,
    acting_grade INT,
    naturalness_grade INT, 
    expresion_grade INT,
    devotion_grade INT,
    CONSTRAINT FOREIGN KEY(actor_films_id) REFERENCES actor_films(id),
    CONSTRAINT FOREIGN KEY(critic_id) REFERENCES critics(id)
);

INSERT INTO actor_critics (actor_films_id, critic_id, acting_grade, naturalness_grade, expresion_grade, devotion_grade)
VALUES 
(2, 3, 6, 7, 9, 7),
(4, 2, 9, 8, 7, 9),
(6, 1, 5, 7, 10, 9),
(10, 2, 5, 6, 5, 9),
(2, 4, 10, 9, 7, 9),
(8, 4, 9, 5, 8, 6),
(12, 3, 7, 8, 7, 6),
(15, 3, 8, 7, 8, 5),
(13, 5, 7, 10, 8, 10),
(3, 1, 8, 6, 8, 9);

-- ------------------------------

CREATE TABLE film_critique (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    film_id INT,
    critic_id INT,
    rating INT,
    CONSTRAINT FOREIGN KEY(film_id) REFERENCES films(id),
    CONSTRAINT FOREIGN KEY(critic_id) REFERENCES critics(id)
);

INSERT INTO film_critique (film_id, critic_id, rating)
VALUES
(2, 1, 7),
(7, 1, 8),
(4, 2, 7),
(5, 3, 7),
(10, 1, 8),
(1, 5, 9),
(9, 4, 7),
(6, 2, 8),
(8, 5, 9),
(3, 1, 9);


-- Draw the diagram and create the database. Fill each tabel with at least 5 rows (so that the actor and movies be at least 10)
-- ● List all information from each table separately
select * from actor_critics;
select * from actor_films;
select * from actor_tv_series;
select * from actors;
select * from critics;
select * from directors;
select * from film_critique;
select * from film_sequels;
select * from films;
select * from movies;
select * from oscar_winners;
select * from tv_series;

-- List information about the movies (name of film, premiere date, genre, country of origin, production, number of actors)

select movies.movie_name, movies.premiere, movies.country_of_origin,
movies.production_name, count(actor_films.actor_id) as 'number of actors'
from movies
left join films on films.movie_id = movies.id
left join actor_films on actor_films.film_id = films.id
where movies.movie_type = 'film'
group by movies.movie_name, movies.premiere, movies.country_of_origin,
movies.production_name, production_name
union
select movies.movie_name, movies.premiere, movies.country_of_origin,
movies.production_name, count(actor_tv_series.actor_id) as 'number of actors'
from movies
left join tv_series on tv_series.movie_id = movies.id
left join actor_tv_series on actor_tv_series.tv_series_id = tv_series.id
where movies.movie_type = 'tv-series'
group by movies.movie_name, movies.premiere, movies.country_of_origin,
movies.production_name, production_name


-- List all information for the actors (first name, last name, nick name, date of birth, agent code and number of movies in which have acted)

select actors.first_name, actors.last_name, actors.nickname, actors.date_of_birth, actors.agent_code,
count(actor_films.film_id) as number_of_films, count(actor_tv_series.tv_series_id) as number_of_tv_series,
count(actor_films.film_id)+count(actor_tv_series.tv_series_id) as total_number_of_movies
from actors
left join actor_films on actor_films.actor_id = actors.id
left join actor_tv_series on actor_tv_series.actor_id = actors.id
group by actors.first_name, actors.last_name, actors.nickname, actors.date_of_birth, actors.agent_code;


-- List all films with their information (premiere city, how much money they have made during the first week of premiere, and premiere format (2D - 3D), ordered by premiere format

select city_premiere, first_week_income, premiere_format
from films
order by premiere_format;

select movies.movie_name, movies.movie_type, films.city_premiere, films.first_week_income, films.premiere_format
from films
join movies on movies.id = films.movie_id
order by premiere_format;

-- List all information about the oscar winners (for which movie they have won an oscar, for which role in that movie and in which year, as well as the name of the first name of the actor, last name, nick name, date of birth and agent code). List all this information sorted by the year in which they have won the oscar, so that the newest will be first.

select movies.movie_name, oscar_winners.actor_role, oscar_winners.year_of_award, actors.first_name,
actors.last_name, actors.nickname, actors.date_of_birth, actors.agent_code 
from oscar_winners
join actor_films on actor_films.id = oscar_winners.actor_films_id
join actors on actors.id = actor_films.actor_id
join films on films.id = actor_films.film_id
join movies on films.movie_id = movies.id
order by year_of_award desc;

-- List all information about the films, along with the actors that have acted in them and the directors which have directed them, ordered by the directors’ names.

select *
from films
join movies on movies.id = films.movie_id
join actor_films on actor_films.film_id = films.id
join actors on actors.id = actor_films.actor_id
join directors on directors.id = films.director_id
order by directors.first_name;

select films.id, films.director_income, films.city_premiere, films.first_week_income, films.premiere_format,
movies.movie_name, movies.premiere, movies.genre, movies.country_of_origin, movies.production_name, movies.movie_type,
group_concat(concat(actors.first_name,' ', actors.last_name)) as actor_name, concat(directors.first_name,' ', directors.last_name) as directors_name
from films
join movies on movies.id = films.movie_id
join actor_films on actor_films.film_id = films.id
join actors on actors.id = actor_films.actor_id
join directors on directors.id = films.director_id
group by films.id
order by directors_name;

-- List all information about the actors who have a lower than average grade given by the critics, and order them from highest to lowest.

select *
from actors
join actor_films on actor_films.actor_id = actors.id
join actor_critics on actor_critics.actor_films_id = actor_films.id
where actor_critics.acting_grade < (select avg(acting_grade) from actor_critics)
order by actor_critics.acting_grade desc;

-- List all oscar winners who are older than the average age of all actors.

select concat(actors.first_name,' ',actors.last_name) as 'Full Name'
from oscar_winners 
join actor_films on actor_films.id = oscar_winners.actor_films_id
join actors on actors.id = actor_films.actor_id
where (timestampdiff(year,actors.date_of_birth, curdate())) > (select avg(TIMESTAMPDIFF(year, date_of_birth, curdate())) from actors);

