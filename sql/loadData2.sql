call LoadCustom();
call LoadItems();

-- Show  tables of data
SELECT "CUSTOMERS: ";
select * from BOOKSTORE_P.CUSTOMERS_P;
SELECT "ITEMS";
select * from BOOKSTORE_P.ITEMS;
SELECT "ORDERS";
select * from BOOKSTORE_P.ORDERS;
SELECT "PROFESSIONALS";
select * from BOOKSTORE_P.PROFESSIONALS;
SELECT "STAFFS";
select * from BOOKSTORE_P.STAFFS;
SELECT "SUBJECTS";
select * from BOOKSTORE_P.SUBJECTS;
