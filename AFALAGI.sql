SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `AFALAGI`.`Company_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Company_Type` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Region` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`City`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`City` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Region` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `City_Region_idx` (`Region` ASC),
  CONSTRAINT `City_Region`
    FOREIGN KEY (`Region`)
    REFERENCES `AFALAGI`.`Region` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Sub_City`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Sub_City` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `City` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Sub_City_City_idx` (`City` ASC),
  CONSTRAINT `Sub_City_City`
    FOREIGN KEY (`City`)
    REFERENCES `AFALAGI`.`City` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Sefer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Sefer` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(50) NULL,
  `Sub_City` INT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Sefer_Sub_City_idx` (`Sub_City` ASC),
  CONSTRAINT `Sefer_Sub_City`
    FOREIGN KEY (`Sub_City`)
    REFERENCES `AFALAGI`.`Sub_City` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Place`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Place` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Region` INT NOT NULL,
  `City` INT NOT NULL,
  `Sub_City` INT NOT NULL,
  `Sefer` INT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Place_Region_idx` (`Region` ASC),
  INDEX `Place_City_idx` (`City` ASC),
  INDEX `Place_Sub_City_idx` (`Sub_City` ASC),
  INDEX `Place_Sefer_idx` (`Sefer` ASC),
  CONSTRAINT `Place_Region`
    FOREIGN KEY (`Region`)
    REFERENCES `AFALAGI`.`Region` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Place_City`
    FOREIGN KEY (`City`)
    REFERENCES `AFALAGI`.`City` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Place_Sub_City`
    FOREIGN KEY (`Sub_City`)
    REFERENCES `AFALAGI`.`Sub_City` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Place_Sefer`
    FOREIGN KEY (`Sefer`)
    REFERENCES `AFALAGI`.`Sefer` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Address` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `POBOX` VARCHAR(45) NULL,
  `Fax` VARCHAR(45) NULL,
  `Email` VARCHAR(100) NULL,
  `Place_ID` INT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Address_Place_idx` (`Place_ID` ASC),
  CONSTRAINT `Address_Place`
    FOREIGN KEY (`Place_ID`)
    REFERENCES `AFALAGI`.`Place` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Catagory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Catagory` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(150) NOT NULL,
  `Catagory_Discription` VARCHAR(400) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Company` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Company_Name` VARCHAR(100) NOT NULL,
  `Company_Type` INT NOT NULL,
  `Address` INT NOT NULL,
  `Catagory` INT NOT NULL,
  `Discription` VARCHAR(500) NULL,
  `Registration_Date` DATETIME NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Company_Type_idx` (`Company_Type` ASC),
  INDEX `Company_Address_idx` (`Address` ASC),
  INDEX `Company_Catagory_idx` (`Catagory` ASC),
  CONSTRAINT `Company_Company_Type`
    FOREIGN KEY (`Company_Type`)
    REFERENCES `AFALAGI`.`Company_Type` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Company_Address`
    FOREIGN KEY (`Address`)
    REFERENCES `AFALAGI`.`Address` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Company_Catagory`
    FOREIGN KEY (`Catagory`)
    REFERENCES `AFALAGI`.`Catagory` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Telephone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Telephone` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Address` INT NOT NULL,
  `Telephone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Telephone_Address_idx` (`Address` ASC),
  CONSTRAINT `Telephone_Address`
    FOREIGN KEY (`Address`)
    REFERENCES `AFALAGI`.`Address` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Payment` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Last_Payment_Date` DATETIME NOT NULL,
  `Expiration_Date` DATETIME NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Payment_Comany`
    FOREIGN KEY (`ID`)
    REFERENCES `AFALAGI`.`Company` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Hotel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Hotel` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Star` TINYINT NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Hotel_Comapny`
    FOREIGN KEY (`ID`)
    REFERENCES `AFALAGI`.`Company` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Service` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Service` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Company_Service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Company_Service` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Company_ID` INT NOT NULL,
  `Company_Service` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Company_Service_Service_idx` (`Company_Service` ASC),
  CONSTRAINT `Company_Service_Company`
    FOREIGN KEY (`Company_ID`)
    REFERENCES `AFALAGI`.`Company` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Company_Service_Service`
    FOREIGN KEY (`Company_Service`)
    REFERENCES `AFALAGI`.`Service` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`User` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `User_Name` VARCHAR(45) NOT NULL,
  `User_Password` CHAR(40) NOT NULL,
  `User_Type` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Building`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Building` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Place` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `Building_Place_idx` (`Place` ASC),
  CONSTRAINT `Building_Place`
    FOREIGN KEY (`Place`)
    REFERENCES `AFALAGI`.`Place` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AFALAGI`.`Famous_Phones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AFALAGI`.`Famous_Phones` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Phone_Number` VARCHAR(45) NOT NULL,
  `Company_Name` VARCHAR(45) NOT NULL,
  `Description` VARCHAR(200) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
