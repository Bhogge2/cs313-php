CREATE TABLE users (
	user_id serial PRIMARY KEY,
	username VARCHAR (80) NOT NULL,
    password VARCHAR (80) NOT NULL
	);

CREATE TABLE user_favorites (
	id int serial PRIMARY KEY,
	pokemon_id int NOT NULL,
	user_id int, 
    CONSTRAINT fk_user_id
      	FOREIGN KEY(user_id)
	  REFERENCES users(user_id)
	);