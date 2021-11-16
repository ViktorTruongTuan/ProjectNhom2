USE master
GO
if exists(SELECT * FROM master..sysdatabases WHERE name='Project')
DROP DATABASE Project
GO
CREATE DATABASE Project 
GO
USE Project
GO
CREATE TABLE Authication 
(Email varchar(100) UNIQUE,
Password varchar(100) CHECK (LEN(Password) >=5),
Role varchar(10) DEFAULT 'User')

CREATE TABLE UserInfor
(Email varchar(100) PRIMARY KEY,
Name varchar(100),
Telephone varchar(10),
Address varchar(200))

CREATE TABLE ProductInfor 
(id varchar(10) PRIMARY KEY,
ProductName varchar(10),
Description varchar(500),
PicturePath varchar(200),
)

CREATE TABLE OrderInfor 
(OrderID varchar(10) PRIMARY KEY,
Email varchar(100) CONSTRAINT FK_Email FOREIGN KEY REFERENCES UserInfor(Email),
Address varchar(200),
Name varchar(100),
Telephone varchar(10),
TotalPrice int
)



CREATE TABLE Cart
(OrderID varchar(10) CONSTRAINT FK_OrderID FOREIGN KEY REFERENCES OrderInfor(OrderID),
ProductID varchar(10) CONSTRAINT FK_ProductID FOREIGN KEY REFERENCES ProductInfor(ProductID),
Price int,
Quantity int
)

CREATE TABLE Staff
(StaffName varchar(30) PRIMARY KEY,
Telephone varchar(10),
Address varchar(100)
)

CREATE TABLE SpaService
(SpaServiceName varchar(20) PRIMARY KEY,
Price int,
Description varchar(300),
Picture varchar(100)
)

CREATE TABLE SpaSchedule
(
Time DATE,
Price int,
SpaService varchar(20) CONSTRAINT FK_SpaService FOREIGN KEY REFERENCES SpaService(SpaServiceName),
StaffName varchar(30) CONSTRAINT FK_StaffName FOREIGN KEY REFERENCES Staff(StaffName)

)






 
