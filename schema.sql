USE wtw;

-- Структура таблицы users в laravel:

-- CREATE TABLE users (
--  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--  name VARCHAR(255) NOT NULL,
--  email VARCHAR(255) NOT NULL UNIQUE,
--  email_verified_at TIMESTAMP NULL,
--  password VARCHAR(255) NOT NULL,
--  remember_token VARCHAR(100) NULL,
--  created_at TIMESTAMP NULL,
--  updated_at TIMESTAMP NULL
--);

ALTER TABLE users
ADD COLUMN avatar VARCHAR(256);

CREATE TABLE serials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  imdb_id INT NOT NULL,
  title VARCHAR(256) NOT NULL,
  title_original VARCHAR(256) NOT NULL,
  year TIMESTAMP NOT NULL,
);

CREATE TABLE serials_votes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  serial_id INT NOT NULL,
  user_id INT NOT NULL,
  vote INT NOT NULL
);

CREATE TABLE genres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  imdb_id INT NOT NULL,
  title VARCHAR(256) NOT NULL
);

CREATE TABLE genre_serial (
  id INT AUTO_INCREMENT PRIMARY KEY,
  serial_id INT NOT NULL,
  genre_id INT NOT NULL
);

CREATE TABLE seasons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  serial_id INT NOT NULL,
  number INT NOT NULL
);

CREATE TABLE episodes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(256) NOT NULL,
  serial_id INT NOT NULL,
  season_id INT NOT NULL,
  number INT NOT NULL,
  air_date TIMESTAMP NOT NULL
);

CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  episode_id INT NOT NULL,
  user_id INT NOT NULL,
  description TEXT NOT NULL,
  parent_id INT,
  created_at TIMESTAMP NOT NULL
);

CREATE TABLE serials_watched (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  serial_id INT NOT NULL
);

CREATE TABLE episodes_watched (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  serial_id INT NOT NULL,
  episode_id INT NOT NULL
);
