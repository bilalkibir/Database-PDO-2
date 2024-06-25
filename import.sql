DROP DATABASE IF EXISTS `netland`;

CREATE DATABASE `netland`;

USE `netland`;


CREATE TABLE gebruikers (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


INSERT INTO gebruikers (username, password) 
VALUES ('testuser', 'testpassword');
