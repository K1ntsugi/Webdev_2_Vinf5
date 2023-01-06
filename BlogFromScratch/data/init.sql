DROP TABLE IF EXISTS post;

CREATE TABLE post (
	id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
	title VARCHAR(255) NOT NULL,
	body VARCHAR(255)  NOT NULL,
	user_id INTEGER NOT NULL,
	created_at VARCHAR(255)  NOT NULL,
	updated_at VARCHAR(255) 
);

INSERT INTO
	post
	(
		title, body, user_id, created_at
	)
	VALUES(
		"Here's our first post",
		"This is the body of the first post.

It is split into paragraphs.",
		1,
		date(now() - INTERVAL 2 month)
	)
;

INSERT INTO
	post
	(
		title, body, user_id, created_at
	)
	VALUES(
		"Now for a second article",
		"This is the body of the second post.
This is another paragraph.",
		1,
		date(now() - INTERVAL 40 day)
	)
;

INSERT INTO
	post
	(
		title, body, user_id, created_at
	)
	VALUES(
		"Here's a third post",
		"This is the body of the third post.
This is split into paragraphs.",
		1,
		date(now() - INTERVAL 13 day)
	)
;