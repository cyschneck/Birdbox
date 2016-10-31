DROP DATABASE IF EXISTS Birdbox;
CREATE DATABASE Birdbox;

USE Birdbox;

DROP TABLE IF EXISTS Display_Info;
CREATE TABLE Display_Info (Bird_ID INTEGER, Common_Name VARCHAR(45), Text VARCHAR(45), Image VARCHAR(45), Color VARCHAR(45));

DROP TABLE IF EXISTS Similarity;
CREATE TABLE Similarity (Sim_ID INTEGER, Bird_ID_1 INTEGER, Bird_ID_2 INTEGER, Bird_1_Text LONGTEXT, Bird_2_Text LONGTEXT);

DROP TABLE IF EXISTS Filters;
CREATE TABLE Filters (Bird_ID INTEGER,Common_Name VARCHAR(45), Sex VARCHAR(45), Scientific_Name VARCHAR(45),Family VARCHAR(45), Length_cm FLOAT, Body_Mass_kg FLOAT, Wingspan_cm FLOAT, Notable_Features VARCHAR(45), C_Black VARCHAR(1), C_White VARCHAR(1), C_Brown VARCHAR(1), C_Red VARCHAR(1), C_Grey VARCHAR(1), C_Orange_Yellow VARCHAR(1), C_Green VARCHAR(1), C_Blue VARCHAR(1), C_Purple VARCHAR(1));

LOAD DATA LOCAL INFILE '/home/user/Dropbox/CSCI3308/Group_Project/CSCI-3308-Group-Project/csv_database/display_info.csv'
INTO TABLE Display_Info
FIELDS TERMINATED BY ','
IGNORE 1 LINES
(Bird_ID,Common_Name,Text,Image,Color);

LOAD DATA LOCAL INFILE '/home/user/Dropbox/CSCI3308/Group_Project/CSCI-3308-Group-Project/csv_database/similarity.csv'
INTO TABLE Similarity
FIELDS TERMINATED BY ','
IGNORE 1 LINES 
(Sim_ID, Bird_ID_1, Bird_ID_2, Bird_1_Text, Bird_2_text);

LOAD DATA LOCAL INFILE '/home/user/Dropbox/CSCI3308/Group_Project/CSCI-3308-Group-Project/csv_database/filter.csv'
INTO TABLE Filters
FIELDS TERMINATED BY ','
IGNORE 1 LINES 
(Bird_ID, Common_Name, Sex, Scientific_Name, Family, Length_cm, Body_Mass_kg, Wingspan_cm, Notable_features, C_Black, C_White, C_Brown, C_Red, C_Grey, C_Orange_Yellow, C_Green, C_Blue, C_purple);
