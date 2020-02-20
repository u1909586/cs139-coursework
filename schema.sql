DROP TABLE User;
CREATE TABLE User (
  UserID INTEGER PRIMARY KEY,
  Name TEXT,
  Email TEXT,
  Password TEXT,
  Salt TEXT
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
