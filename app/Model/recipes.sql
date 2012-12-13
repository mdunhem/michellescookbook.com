# Recipes Database

create table recipes (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
		name VARCHAR(25),
		description VARCHAR(50),
		image VARCHAR(50), 
		prep_time TIME,
		cook_time TIME
	)
	ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table ingredients (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
		name VARCHAR(50),
		measure VARCHAR(50),
		measure_amount INT NOT NULL,
		recipe_id INT
	) 
	ENGINE=InnoDB DEFAULT CHARSET=utf8; 

create table directions (
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
		step VARCHAR(30),
		step_number INT NOT NULL,
		recipe_id INT
	)
	ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Add some initial values...

INSERT INTO directions (step, step_number, recipe_id) VALUES('Add sugar.', 1, 1);

INSERT INTO ingredients (name, measure, measure_amount, recipe_id) VALUES('sugar', 'cup', 1, 1);

INSERT INTO recipes (name, description, image, prep_time, cook_time) VALUES('Chocolate Cake', 'Yummy cake', 'cake.png', '01:15:00', '00:30:00');