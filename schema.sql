CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('editor', 'writer') NOT NULL,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (email)
);

CREATE TABLE articles (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  post TEXT NOT NULL,
  user_id INT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT,
  article_id INT NOT NULL,
  comment TEXT NOT NULL,
  user_id INT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
 /* This schema includes tables for users, articles, and comments. 
 The users table includes columns for email, phone, password, role, first name, and last name. 
 The articles table includes columns for title, post, user_id, and timestamps for when the article was created and last updated. 
 The comments table includes columns for the article_id, user_id, comment text, and timestamps for when the comment was created and last updated.

Note that the schema includes foreign keys to enforce referential integrity between the tables, 
and the CASCADE option is used to ensure that related records are deleted or updated when the primary record is deleted or updated.

You can modify this schema to fit your specific requirements and preferences, 
but this should give you a starting point for creating your own database schema. */