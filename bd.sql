CREATE DATABASE IF NOT EXISTS not_secure;
USE not_secure;

CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(40) NOT NULL ,
    email TEXT NOT NULL,
    pass TEXT NOT NULL 
   
);

INSERT INTO user (nom ,prenom ,email, pass) VALUES
('Amal', 'Dadda Amami ','amal@gmail.com','amal123'),
