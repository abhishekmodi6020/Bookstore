
CREATE DATABASE BOOKSTORE_P;
CREATE TABLE BOOKSTORE_P.CUSTOMERS_P (
	Cust_ID int not null AUTO_INCREMENT,
	Cust_IDPhone_no char(10) not null,
	Cust_Name varchar(50) not null,
	Cust_CreatedDate datetime not null ,
	Cust_Email varchar(50) not null,
	Cust_Address varchar(255) not null,
	Cust_Username varchar (50) not null,
	Cust_password varchar(255) not null,
	Cust_CreditCard_infos varchar(255) not null,
	PRIMARY KEY(Cust_ID)
);
CREATE TABLE BOOKSTORE_P.ORDERS(
	ORDER_ID int not null AUTO_INCREMENT,
	O_Cust_ID int not null,
	O_Qty int not null,
	O_ProcessedBy int not null,
	O_Unit_price int not null,
	Order_date datetime not null ,
	O_Total_price int not null,
	O_Item_ID int not null,
	PRIMARY KEY(ORDER_ID)
);
CREATE TABLE BOOKSTORE_P.STAFFS(
	S_ID int not null AUTO_INCREMENT,
	Salary int not null,
	S_Name varchar(50) not null,
	S_position varchar(50),
	PRIMARY KEY(S_ID)
);
CREATE TABLE BOOKSTORE_P.ITEMS(
	Item_ID int not null AUTO_INCREMENT,
	Item_count int,
	I_Description varchar(100),
	I_Subject_ID int not null,
  Item_image				longblob		,
  created						datetime 		,
	I_Name varchar(50) not null,
	Item_Type enum('Ebook','Movie','Periodical') not null,
	I_pdfSize float,
	I_DirName varchar(50),
	I_pub_Frequency float,
	PRIMARY KEY (Item_ID)
);
CREATE TABLE BOOKSTORE_P.SUBJECTS(
	Subject_ID int not null AUTO_INCREMENT,
	Sub_name varchar(50) not null,
	Sub_Description varchar(50) not null,
	PRIMARY KEY(Subject_ID)
);
CREATE TABLE BOOKSTORE_P.PROFESSIONALS(
	Professional_ID int not null AUTO_INCREMENT,
	P_pub_ID int,
	P_Author_ID int,
	P_Director_ID int,
	P_Name varchar(50) not null,
	Professional_Type enum('Author','Director','Publisher') not null,
	PRIMARY KEY (Professional_ID)
);
CREATE TABLE BOOKSTORE_P.CREATEDBY(
	CREATEDBY_ID INT NOT NULL AUTO_INCREMENT,
	Professional_ID int not null,
	Item_ID int not null,
	PRIMARY KEY(CREATEDBY_ID),
	FOREIGN KEY (ITEM_ID) REFERENCES ITEMS(Item_ID),
	FOREIGN KEY (Professional_ID) REFERENCES PROFESSIONALS(Professional_ID)
);

ALTER TABLE BOOKSTORE_P.ORDERS
	ADD FOREIGN KEY (O_Cust_ID) REFERENCES CUSTOMERS_P(Cust_ID) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD FOREIGN KEY (O_ProcessedBy) REFERENCES STAFFS(S_ID) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD FOREIGN KEY (O_Item_ID) REFERENCES ITEMS(Item_ID) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE BOOKSTORE_P.ITEMS
	ADD FOREIGN KEY (I_Subject_ID)REFERENCES SUBJECTS(Subject_ID) ON DELETE CASCADE ON UPDATE CASCADE;
