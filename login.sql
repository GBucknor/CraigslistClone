CREATE TABLE Login
(
    id          INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,userName   VARCHAR(30) NOT NULL
    ,passName   VARCHAR(30) NOT NULL
);

INSERT INTO Login (id, userName, passName) VALUES (Null, 'Ryan', '1234');