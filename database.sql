-- Create the database
CREATE DATABASE bank_management;

-- Use the database
USE bank_management;

-- Create the login system table to store user credentials
CREATE TABLE UserLogin (
  Username VARCHAR(50) PRIMARY KEY,
  Password VARCHAR(100) NOT NULL
);

-- Create the Bank table
CREATE TABLE Bank (
  Bank_ID INT PRIMARY KEY,
  Bank_Name VARCHAR(100) NOT NULL,
  Bank_Address VARCHAR(200) NOT NULL
);

-- Create the Employee table
CREATE TABLE Employee (
  Employee_ID INT PRIMARY KEY,
  Employee_Name VARCHAR(100) NOT NULL,
  Employee_Address VARCHAR(200) NOT NULL,
  Employee_Salary DECIMAL(10, 2) NOT NULL,
  Bank_ID INT,
  FOREIGN KEY (Bank_ID) REFERENCES Bank(Bank_ID)
);

-- Create the Customer table
CREATE TABLE Customer (
  Customer_ID INT PRIMARY KEY,
  Customer_Name VARCHAR(100) NOT NULL,
  Customer_Address VARCHAR(200) NOT NULL,
  Bank_ID INT,
  FOREIGN KEY (Bank_ID) REFERENCES Bank(Bank_ID)
);

-- Create the Loan table
CREATE TABLE Loan (
  Loan_ID INT PRIMARY KEY,
  Loan_Amount DECIMAL(12, 2) NOT NULL,
  Customer_ID INT,
  FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

-- Create the Accounts table
CREATE TABLE Accounts (
  Account_Number INT PRIMARY KEY,
  Account_Balance DECIMAL(12, 2) NOT NULL,
  Customer_ID INT,
  FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);
