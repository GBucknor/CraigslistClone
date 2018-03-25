CREATE TABLE Login
(
    id          INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,userName   VARCHAR(30) NOT NULL
    ,passName   VARCHAR(30) NOT NULL
);

INSERT INTO Login (id, userName, passName) VALUES (Null, 'Ryan', '1234');

CREATE TABLE Posting
(
    postID          INT(6)          UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,title          VARCHAR(50)     NOT NULL
    ,specLoc        VARCHAR(100)
    ,postCode       VARCHAR(10)
    ,body           MEDIUMTEXT      NOT NULL
    ,contactOp      VARCHAR(15)
    ,phoneNum       VARCHAR(15)
    ,contactName    VARCHAR(30)
);