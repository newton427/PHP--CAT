# PHP--CAT
# # SQL QUERY
CREATE TABLE authorstb (
  AuthorId INT PRIMARY KEY AUTO_INCREMENT,
  AuthorFullName VARCHAR(255) NOT NULL,
  AuthorEmail VARCHAR(255) NOT NULL UNIQUE,
  AuthorAddress VARCHAR(255),
  AuthorBiography MEDIUMTEXT NOT NULL,
  AuthorDateOfBirth DATE NOT NULL,
  AuthorSuspended TINYINT(1) NOT NULL
);
 
