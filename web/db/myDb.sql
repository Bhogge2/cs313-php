CREATE TABLE users (
	user_id serial PRIMARY KEY,
	username VARCHAR (80) NOT NULL,
    password VARCHAR (80) NOT NULL
	);

CREATE TABLE user_favorites (
	pokemon_id int NOT NULL,
	user_id int, 
    CONSTRAINT fk_user_id
      	FOREIGN KEY(user_id)
	  REFERENCES users(user_id)
	);

CREATE TABLE pokemon (
	pokemon_id serial PRIMARY KEY,
	pokemon_name VARCHAR (80) NOT NULL,
	pokemon_type VARCHAR (80) NOT NULL,
	pokemon_type2 VARCHAR (80) NOT NULL
);

INSERT INTO pokemon (pokemon_name, pokemon_type, pokemon_type2) VALUES ('Bulbasaur', 'Grass', 'Poison');
INSERT INTO pokemon (pokemon_name, pokemon_type, pokemon_type2) VALUES 
('Bulbasaur', 'Grass', 'Poison'), 
('Ivysaur', 'Grass', 'Poison'),
('Venusaur', 'Grass', 'Poison'),
('Charmander', 'Fire', ''),
('Charmeleon', 'Fire', ''),
('Charizard', 'Fire', 'Flying'),
('Squirtle', 'Water', ''),
('Wartortle', 'Water', ''),
('Blastoise', 'Water', '')
;
