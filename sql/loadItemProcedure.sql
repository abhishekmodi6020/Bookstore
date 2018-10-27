-- Insert orginal staff
INSERT INTO `STAFFS`(`Salary`, `S_Name`, `S_position`) VALUES ('20000','joanah','reception');
INSERT INTO `STAFFS`(`Salary`, `S_Name`, `S_position`) VALUES ('20000','Brenda','cashier');
-- Insert orginal SUBJECTS
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Science','Just scientific general');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Romance','Just  general Romance');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Fiction','Just  general Fiction');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Art','Just  general Art');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('History','Just  general History');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Recipe','Just  general Recipe for food lover');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('Travel','who doesn\'t love to travel?');
INSERT INTO `SUBJECTS`(`Sub_name`, `Sub_Description`) VALUES ('General','Just  others');
-- Insert original PROFESSIONALS
INSERT INTO `PROFESSIONALS`(`P_Name`, `Professional_Type`) VALUES ('lisa', 'Author');
INSERT INTO `PROFESSIONALS`(`P_Name`, `Professional_Type`) VALUES ('john', 'Director');
INSERT INTO `PROFESSIONALS`(`P_Name`, `Professional_Type`) VALUES ('gemini', 'Publisher');

/*-- Insert original Items
--INSERT INTO `ITEMS`(`Item_count`, `I_Description`, `I_Subject_ID`, `I_Name`, `Item_Type`, `I_pdfSize`, `I_DirName`, `I_pub_Frequency`) VALUES (`4`, `banana for fruit lover`, `8`, `banana`, `Periodical`, `0`, `none`, `3`);
-- create ITEMS loading PROCEDURE*/
DELIMITER //
CREATE PROCEDURE LoadItems()
BEGIN
  DECLARE v1 INT DEFAULT 0;
  DECLARE VAR varchar(50);
  DECLARE pdf float DEFAULT 0;
  DECLARE pub float DEFAULT 0;
  DECLARE Dir varchar(50);
  DECLARE name varchar(50);
  DECLARE Descr varchar(50);
  DECLARE created	datetime DEFAULT CURRENT_TIMESTAMP;
  SET  v1=0;
  WHILE v1 < 20  DO
  			 set name=concat('john ',v1);
    		 set Descr=concat('For those who love',name);
           	 IF v1<8 THEN
            	SET VAR="Movie";
                set Dir= concat('joe ',v1);
             ELSEIF v1<13 THEN
             	SET VAR="Ebook";
                Set pdf=300.8+v1;
                set Dir="none";
                Set pub =0;
             ELSE
             	SET VAR="Periodical";
                Set pdf=0;
                set Dir="none";
                Set pub =v1+0.5;
             END IF;
             SELECT VAR;
             INSERT INTO `ITEMS`(`Item_count`, `I_Description`, `I_Subject_ID`,`created`, `I_Name`, `Item_Type`, `I_pdfSize`, `I_DirName`, `I_pub_Frequency`) VALUES ('20', Descr, '3',created, name, VAR, pdf, Dir,pub);
             SET  v1= v1+1;
  END WHILE;
END
