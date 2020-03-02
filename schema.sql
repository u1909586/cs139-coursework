DROP TABLE User;
CREATE TABLE User (
  UserID INTEGER PRIMARY KEY,
  Name TEXT,
  Email TEXT,
  Password TEXT,
  Salt TEXT
);

DROP TABLE Groups;
CREATE TABLE Groups (
  GroupID INTEGER PRIMARY KEY,
  UserID INTEGER,
  Reference TEXT
);

DROP TABLE GroupPeople;
CREATE TABLE GroupPeople (
  PersonGroupID INTEGER PRIMARY KEY,
  GroupID INTEGER,
  Name TEXT,
  Email TEXT,
  Reference TEXT
);

DROP TABLE Expenses;
CREATE TABLE Expenses (
  ExpenseID INTEGER PRIMARY KEY,
  UserID INTEGER,
  Name TEXT,
  DateCreated DATE
);

DROP TABLE ExpenseOwe;
CREATE TABLE ExpenseOwe(
  PersonID INTEGER PRIMARY KEY,
  ExpenseID INTEGER,
  UserID INTEGER,
  Name TEXT,
  Amount INTEGER,
  Reference TEXT,
  Email TEXT,
  Paid BOOLEAN
);
