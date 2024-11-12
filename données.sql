CREATE DATABASE mmwebdesign;

USE mmwebdesign;

CREATE TABLE contact_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
