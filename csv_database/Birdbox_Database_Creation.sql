CREATE DATABASE Birdbox;

USE Birdbox;

CREATE TABLE Display_Info (Bird_ID INTEGER, Text VARCHAR(45), Image VARCHAR(45), Colors VARCHAR(45));

CREATE TABLE Similarity (Bird_1_Text LONGTEXT, Bird_2_Text LONGTEXT, Bird_ID_1 INTEGER, Bird_ID_2 INTEGER, Sim_ID INTEGER);

CREATE TABLE Filters (Common_Name VARCHAR(45), Sex VARCHAR(45), Family VARCHAR(45), Len FLOAT, Body_Mass FLOAT, Wingspan FLOAT, Notable_Features VARCHAR(45), C_Black VARCHAR(1), C_White VARCHAR(1), C_Brown VARCHAR(1), C_Red VARCHAR(1), C_Grey VARCHAR(1), C_Orange_Yellow VARCHAR(1), C_Green VARCHAR(1), C_Blue VARCHAR(1), C_Purple VARCHAR(1), Bird_ID INTEGER);

LOAD DATA LOCAL INFILE '/home/user/CSCI-3308-Group-Project/csv_database/display_info.csv'
INTO TABLE Display_Info
FIELDS TERMINATED BY ',';

LOAD DATA LOCAL INFILE '/home/user/CSCI-3308-Group-Project/csv_database/similarity.csv'
INTO TABLE Similarity
FIELDS TERMINATED BY ',';

LOAD DATA LOCAL INFILE '/home/user/CSCI-3308-Group-Project/csv_database/filter.csv'
INTO TABLE Filters
FIELDS TERMINATED BY ',';

