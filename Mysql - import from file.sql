CREATE TABLE geonames( 
geonameid int NOT NULL primary key, 
name nvarchar(200) NULL, 
asciiname nvarchar(200) NULL, 
alternatenames varchar(10000) NULL, 
latitude float NULL, 
longitude float NULL, 
feature_class char(2) NULL, 
feature_code nvarchar(10) NULL, 
country_code char(3) NULL, 
cc2 char(60) NULL, 
admin1_code nvarchar(20) NULL, 
admin2_code nvarchar(80) NULL, 
admin3_code nvarchar(20) NULL, 
admin4_code nvarchar(20) NULL, 
population bigint NULL, 
elevation int NULL, 
gtopo30 int NULL, 
timezone char(31) NULL, 
modification_date date NULL 
);
LOAD DATA LOW_PRIORITY INFILE 'C:/ProgramData/MySQL/MySQL Server 5.7/Uploads/RU.txt'
INTO TABLE vita.geonames 
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n'; 