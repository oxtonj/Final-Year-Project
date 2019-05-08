USE oxtonj;


DROP TABLE IF EXISTS CSS;
DROP TABLE IF EXISTS SALES;
DROP TABLE IF EXISTS PRODUCTS;
DROP TABLE IF EXISTS ACCOUNTS;

SELECT *
FROM ACCOUNTS;

SELECT *
FROM PRODUCTS;

SELECT *
FROM SHOPPING_CART;



SELECT SHOPPING_CART.SC_ID, SHOPPING_CART.ACCOUNT_ID, ACCOUNTS.ACCOUNT_ID, ACCOUNTS.USERNAME, ACCOUNTS.FIRST_NAME, ACCOUNTS.LAST_NAME, ACCOUNTS.ADDRESS, SHOPPING_CART.PRODUCT_ID, PRODUCTS.PRODUCT_ID, PRODUCTS.PRODUCT_NAME, PRODUCTS.PRICE, SUM(PRODUCTS.PRICE) AS TOTAL_PRICE 
FROM SHOPPING_CART, ACCOUNTS, PRODUCTS 
WHERE SHOPPING_CART.ACCOUNT_ID = ACCOUNTS.ACCOUNT_ID 
AND SHOPPING_CART.PRODUCT_ID = PRODUCTS.PRODUCT_ID 
AND SHOPPING_CART.ACCOUNT_ID = "3"
GROUP BY SHOPPING_CART.SC_ID;






CREATE TABLE ACCOUNTS
(ACCOUNT_ID INT NOT NULL AUTO_INCREMENT,
 USERNAME VARCHAR(12) NOT NULL,
 PASSWORD VARCHAR(20) NOT NULL,
 FIRST_NAME VARCHAR(10) NOT NULL,
 LAST_NAME VARCHAR(20) NOT NULL,
 ADDRESS VARCHAR(100) NOT NULL,
 TELEPHONE VARCHAR(13) NOT NULL,
 EMAIL VARCHAR(40) NOT NULL,
 DATE_JOINED DATE NOT NULL,
 CONSTRAINT ACCOUNT_ID_PK PRIMARY KEY (ACCOUNT_ID)
 );
 
 
 CREATE TABLE PRODUCTS
 (PRODUCT_ID INT NOT NULL AUTO_INCREMENT,
  PRODUCT_NAME VARCHAR(20),
  PRICE VARCHAR(7),
  PRODUCT_TYPE VARCHAR(10),
  PRODUCT_DESCRIPTION VARCHAR(100),
  PRODUCT_IMAGE VARCHAR(50),
  CONSTRAINT PRODUCT_ID_PK PRIMARY KEY (PRODUCT_ID)
  );
  
  CREATE TABLE SALES
  (SALES_ID INT NOT NULL AUTO_INCREMENT,
   PRODUCT_ID INT NOT NULL,
   ACCOUNT_ID INT NOT NULL,
   USERNAME VARCHAR(12) NOT NULL,
 FIRST_NAME VARCHAR(10) NOT NULL,
 LAST_NAME VARCHAR(20) NOT NULL,
 ADDRESS VARCHAR(100) NOT NULL,
 PRODUCT_NAME VARCHAR(20),
  PRICE VARCHAR(7),
   DATE_OF_SALE DATE,
   CONSTRAINT SALES_ID_PK PRIMARY KEY (SALES_ID),
   FOREIGN KEY(PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID),
   FOREIGN KEY(ACCOUNT_ID) REFERENCES ACCOUNTS(ACCOUNT_ID)
   );
   
   CREATE TABLE CSS
   (
     CSS_ID INT NOT NULL AUTO_INCREMENT,
     CSS_LINK VARCHAR(20),
     CONSTRAINT CSS_ID_PK PRIMARY KEY (CSS_ID)
   
   );
   
   
     CREATE TABLE SHOPPING_CART
  (SC_ID INT NOT NULL AUTO_INCREMENT,
   PRODUCT_ID INT NOT NULL,
   ACCOUNT_ID INT NOT NULL,
   CONSTRAINT SC_ID_PK PRIMARY KEY (SC_ID),
   FOREIGN KEY(PRODUCT_ID) REFERENCES PRODUCTS(PRODUCT_ID),
   FOREIGN KEY(ACCOUNT_ID) REFERENCES ACCOUNTS(ACCOUNT_ID)
   );
   
   
INSERT INTO ACCOUNTS(USERNAME, PASSWORD, FIRST_NAME, LAST_NAME, ADDRESS, TELEPHONE, EMAIL, DATE_JOINED)
VALUES('ADMIN','PASSWORD','JOSEPH', 'OXTON' ,'37 HIGH STREET', '0293828282', 'ADMIN@MAIL.COM', '2018-01-29');


INSERT INTO PRODUCTS(PRODUCT_NAME, PRICE, PRODUCT_TYPE, PRODUCT_DESCRIPTION,  PRODUCT_IMAGE)
VALUES('Football Boots', '12.99', 'FOOTBALL', 'Ball control is improved with flat toe. Material comfortable and adapts to foot.',  'NikeZoomAirFootballBoots.jpg');

INSERT INTO PRODUCTS(PRODUCT_NAME, PRICE, PRODUCT_TYPE, PRODUCT_DESCRIPTION, PRODUCT_IMAGE)    
VALUES('Goalkeeper Gloves  ', '5.99', 'FOOTBALL', 'Offers high protection which is flexible and wrist is bandage style.' , 'footballgoalkeeperglovesselect34.jpg');

INSERT INTO PRODUCTS(PRODUCT_NAME, PRICE, PRODUCT_TYPE, PRODUCT_DESCRIPTION, PRODUCT_IMAGE)
VALUES('Shin Guards', '23.99', 'FOOTBALL','Guard secured with ankle protection' , 'shinguards.jpg');

INSERT INTO PRODUCTS(PRODUCT_NAME, PRICE, PRODUCT_TYPE, PRODUCT_DESCRIPTION, PRODUCT_IMAGE)
VALUES('Football', '6.99', 'FOOTBALL', 'High quality football.', 'Football.jpg');

INSERT INTO CSS(CSS_LINK)    
VALUES('style.css');    