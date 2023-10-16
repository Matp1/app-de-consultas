CREATE DATABASE login;

USE login;

CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_visit TINYINT(1) NOT NULL DEFAULT 1
);

CREATE TABLE pacientes (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED,
    idade INT(3) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    data_nascimento DATE NOT NULL,
    sexo ENUM('feminino', 'masculino', 'outro') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE medico (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, -- Define a coluna 'name' como uma string de até 255 caracteres, não pode ser deixada em branco.
    idade INT(3) NOT NULL,
    email VARCHAR(255) NOT NULL, -- Define a coluna 'email' como uma string de até 255 caracteres, não pode ser deixada em branco.
    telefone VARCHAR(15) NOT NULL,
	dia_consulta DATE NOT NULL,
    sexo ENUM('feminino', 'masculino', 'outro') NOT NULL
);
