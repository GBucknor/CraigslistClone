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
    ,catPostID      VARCHAR(50)     NOT NULL
);

CREATE TABLE Categories
(
    catID           INT(8)          UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,catName        VARCHAR(255)    NOT NULL
);

INSERT INTO Categories (catID, catNAme)
VALUES
    (NULL, "activites")
    ,(NULL, "artists")
    ,(NULL, "childcare")
    ,(NULL, "classes")
    ,(NULL, "events")
    ,(NULL, "general")
    ,(NULL, "groups")
    ,(NULL, "localnews")
    ,(NULL, "lostfound")
    ,(NULL, "missed")
    ,(NULL, "connecetions")
    ,(NULL, "musicians")
    ,(NULL, "pets")
    ,(NULL, "polititcs")
    ,(NULL, "rantraves")
    ,(NULL, "rideshare")
    ,(NULL, "volunteers")
    ,(NULL, "beauty")
    ,(NULL, "cellmobile")
    ,(NULL, "computer")
    ,(NULL, "creative")
    ,(NULL, "cycle")
    ,(NULL, "events")
    ,(NULL, "farmgarden")
    ,(NULL, "financial")
    ,(NULL, "household")
    ,(NULL, "labormove")
    ,(NULL, "legal")
    ,(NULL, "lessons")
    ,(NULL, "marine")
    ,(NULL, "pet")
    ,(NULL, "realestate")
    ,(NULL, "skilledtrade")
    ,(NULL, "smbizads")
    ,(NULL, "therapeutic")
    ,(NULL, "travelvac")
    ,(NULL, "writeedtran")
    
    ,(NULL, "aptshousing")
    ,(NULL, "houseswap")
    ,(NULL, "housingwanted")
    ,(NULL, "officecom")
    ,(NULL, "parking")
    ,(NULL, "realsale")
    ,(NULL, "roomsshare")
    ,(NULL, "roomswant")
    ,(NULL, "vacrentals")
    
    ,(NULL, "antiques")
    ,(NULL, "appliances")
    ,(NULL, "artscraft")
    ,(NULL, "atvutv")
    ,(NULL, "autoparts")
    ,(NULL, "aviation")
    ,(NULL, "babykid")
    ,(NULL, "barter")
    ,(NULL, "beautyhlth")
    ,(NULL, "bikes")
    ,(NULL, "boats")
    ,(NULL, "books")
    ,(NULL, "businesssale")
    ,(NULL, "carstruck")
    ,(NULL, "cdsdvd")
    ,(NULL, "cellphones")
    ,(NULL, "clothesacc")
    ,(NULL, "collectibles")
    ,(NULL, "computerssale")
    ,(NULL, "electronics")
    ,(NULL, "farmsales")
    ,(NULL, "free")
    ,(NULL, "furniture")
    ,(NULL, "garagessale")
    ,(NULL, "general")
    ,(NULL, "heavyequip")
    ,(NULL, "household")
    ,(NULL, "jewelry")
    ,(NULL, "materials")
    ,(NULL, "motorcycles")
    ,(NULL, "musicinstr")
    ,(NULL, "photovid")
    ,(NULL, "rvscamp")
    ,(NULL, "sporting")
    ,(NULL, "tickets")
    ,(NULL, "tools")
    ,(NULL, "toysgames")
    ,(NULL, "trailers")
    ,(NULL, "videogaming")
    ,(NULL, "wantedsales")
    
    ,(NULL, "accfinance")
    ,(NULL, "adminoffice")
    ,(NULL, "archeng")
    ,(NULL, "artmedia")
    ,(NULL, "biotech")
    ,(NULL, "businessmgm")
    ,(NULL, "customerserv")
    ,(NULL, "education")
    ,(NULL, "foodbev")
    ,(NULL, "generallab")
    ,(NULL, "govern")
    ,(NULL, "humanres")
    ,(NULL, "interteng")
    ,(NULL, "paralegal")
    ,(NULL, "manufacture")
    ,(NULL, "marketing")
    ,(NULL, "medicaljob")
    ,(NULL, "nonprofit")
    ,(NULL, "estatejob")
    ,(NULL, "wholesale")
    ,(NULL, "salejob")
    ,(NULL, "salonjob")
    ,(NULL, "securityjob")
    ,(NULL, "skilltrade")
    ,(NULL, "software")
    ,(NULL, "netjob")
    ,(NULL, "techjob")
    ,(NULL, "transjob")
    ,(NULL, "tvjob")
    ,(NULL, "webjob")
    ,(NULL, "writejob")
    ,(NULL, "ETC")
    ,(NULL, "partime")
    
    ,(NULL, "computergig")
    ,(NULL, "creativegig")
    ,(NULL, "crewgig")
    ,(NULL, "domgig")
    ,(NULL, "eventgig")
    ,(NULL, "labgig")
    ,(NULL, "talgig")
    ,(NULL, "writegig")
    
    ,(NULL, "resumes")
    
    ,(NULL, "android")
    ,(NULL, "apple")
    ,(NULL, "arts")
    ,(NULL, "atheist")
    ,(NULL, "autos")
    ,(NULL, "beautyF")
    ,(NULL, "bikesF")
    ,(NULL, "celebs") 
    ,(NULL, "compF")
    ,(NULL, "cosmos")
    ,(NULL, "craft")
    ,(NULL, "diet")
    ,(NULL, "divorce")
    ,(NULL, "dying")
    ,(NULL, "eco")
    ,(NULL, "educ")
    ,(NULL, "elder") 
    ,(NULL, "feedbk")
    
    ,(NULL, "film") 
    ,(NULL, "fitness")
    ,(NULL, "fixit")
    ,(NULL, "food")
    ,(NULL, "frugal")
    ,(NULL, "gamingF")
    ,(NULL, "gardenF")
    ,(NULL, "haiku")
    ,(NULL, "help")
    ,(NULL, "history") 
    ,(NULL, "housingF")
    
    ,(NULL, "jobsF") 
    ,(NULL, "jokeF")
    ,(NULL, "legalF")
    ,(NULL, "linuxF")
    ,(NULL, "manners")
    ,(NULL, "marriage")
    ,(NULL, "moneyF")
    ,(NULL, "music")
    ,(NULL, "open")
    ,(NULL, "outdoors") 
    ,(NULL, "over50")
    
    ,(NULL, "parent") 
    ,(NULL, "petF")
    ,(NULL, "philo")
    ,(NULL, "photoF")
    ,(NULL, "politicsF")
    ,(NULL, "psych")
    ,(NULL, "recover")
    ,(NULL, "religion")
    ,(NULL, "educ")
    ,(NULL, "elder") 
    ,(NULL, "feedbk");
    
CREATE TABLE topics (
    topic_id                INT(8)         NOT NULL AUTO_INCREMENT
    ,topic_subject          VARCHAR(255)   NOT NULL
    ,topic_date             DATETIME       NOT NULL
    ,topic_cat              INT(8)         NOT NULL
    ,topic_by               INT(8)         NOT NULL
    ,PRIMARY KEY (topic_id)
);


ALTER TABLE Posting
ADD catPostID VARCHAR(50)     NOT NULL;

DELETE FROM Posting
WHERE postID=2;

UPDATE Posting
SET postID = 2
WHERE postID = 3;