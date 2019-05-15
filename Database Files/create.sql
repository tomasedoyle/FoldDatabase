SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS Item;
DROP TABLE IF EXISTS OrderInfo;
DROP TABLE IF EXISTS Preference;
DROP TABLE IF EXISTS ItemLocation;
DROP TABLE IF EXISTS Location;


CREATE TABLE USER (
  UserID int auto_increment,
  Username VARCHAR(50),
  Password VARCHAR(50),
  Firstname VARCHAR(50),
  Lastname VARCHAR(50),
  Email VARCHAR(50),
  Streetaddress VARCHAR(50),
  Residencehall VARCHAR(50),
  City VARCHAR(50),
  UserType VARCHAR(50),
  PRIMARY KEY(UserID)
);


CREATE TABLE Item (ItemName VARCHAR(50),
                            ServingSize int, QuantityInStock int,
                            Calories int, TotalFat int, TransFat int,
                            Cholesterol int, Sodium int, TotalCarbs int,
                            Fiber int, Sugar int, Protein int, Vegan boolean,
                            Vegetarian boolean, Halal boolean, Kosher boolean,
                            International boolean, Price float, ItemID int auto_increment, PRIMARY KEY(ItemID));


CREATE TABLE OrderInfo (OrderID int auto_increment, TimePlaced DATETIME, Quantity int, Instructions VARCHAR(255),
                                                                                TotalPrice float, CardNum int, CVV int, ExpirationDate date, UserID int, ItemID int, PRIMARY KEY(OrderID),
                        FOREIGN KEY(UserID) REFERENCES USER(UserID),
                        FOREIGN KEY(ItemID) REFERENCES Item(ItemID));


CREATE TABLE Preference (UserID int, ItemID int,
                         FOREIGN KEY(UserID) REFERENCES USER(UserID) ON DELETE CASCADE,
                         FOREIGN KEY(ItemID) REFERENCES Item(ItemID) ON DELETE CASCADE);


CREATE TABLE Location (LocationID int auto_increment, LocationName VARCHAR(50),
                                                PRIMARY KEY(LocationID));


CREATE TABLE ItemLocation (ItemID int, LocationID int,
                           FOREIGN KEY(ItemID) REFERENCES Item(ItemID) ON DELETE CASCADE,
                           FOREIGN KEY(LocationID) REFERENCES Location(LocationID) ON DELETE CASCADE);
