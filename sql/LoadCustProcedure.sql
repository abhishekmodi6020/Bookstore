/*-- Insert CUSTOMERS original
--INSERT INTO `CUSTOMERS_P`(`Cust_IDPhone_no`, `Cust_Name`, `Cust_Email`, `Cust_Address`, `Cust_Username`, `Cust_password`, `Cust_CreditCard_infos`) VALUES ('0123456789', 'Yves', 'Yves@gmail.com', 'UTA blvd', 'Enzo', 'password', '2345123409874567');
-- Create customer loading store PROCEDURE*/
DELIMITER //
CREATE PROCEDURE LoadCustom()
BEGIN
  DECLARE v1 INT DEFAULT 0;
  DECLARE phone varchar(50) default "01234567";
  DECLARE name varchar(50);
  Declare email varchar(50);
  Declare address varchar(50);
  Declare user_name varchar(50);
  Declare pass varchar(50);
  Declare cc varchar(50);
  DECLARE createdDate	datetime DEFAULT CURRENT_TIMESTAMP;
  SET  v1=0;
  WHILE v1 < 10  DO
            set name=concat('john ',v1);
            set email=concat(name,'@gmail.com');
            set phone=concat(v1,phone);
            set address=concat('UTA blvd ',v1);
            set user_name=concat(name,v1);
            set pass=concat('passw00d ',v1);
            set cc=concat('345123409089096',v1);
            select v1;
            INSERT INTO `CUSTOMERS_P`(`Cust_IDPhone_no`, `Cust_Name`,`Cust_CreatedDate`, `Cust_Email`, `Cust_Address`, `Cust_Username`, `Cust_password`, `Cust_CreditCard_infos`) VALUES (phone, name, createdDate,email, address, user_name, pass, cc);
            SET  v1= v1+1;
  END WHILE;
END;
