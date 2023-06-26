CREATE DATABASE Hima_TMS_database;

USE Hima_TMS_database;

CREATE TABLE TMS_driver(

    emp_id VARCHAR(4) NOT NULL,
    f_name VARCHAR(15) NOT NULL,
    l_name VARCHAR(15) NOT NULL,
    sex CHAR(1) NOT NULL,
    tel_no VARCHAR(15) NOT NULL,
    email VARCHAR(15) NOT NULL,
    residence VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    emp_img LONGBLOB,
    emp_img_type VARCHAR(5) NOT NULL,
    permit_no VARCHAR(20) NOT NULL,
    work_status VARCHAR(14) NOT NULL DEFAULT 'available',
    acc_password VARCHAR(100) NOT NULL DEFAULT 'newUser',
    acc_status VARCHAR(10) NOT NULL DEFAULT 'new',
    last_login DATE,
    CHECK (sex IN ('M' or 'F')),
    CHECK (CHAR_LENGTH(acc_password) > 5),
    PRIMARY KEY (`emp_id`)
    
);

INSERT INTO TMS_driver (
    emp_id, f_name, l_name, sex, tel_no, email, residence, date_of_birth,
    emp_img, emp_img_type,
    permit_no, work_status, acc_password, acc_status,
    last_login
)
VALUES  
(NULL, 'James', 'Lopez', 'M', '555666777', 'james.lopez@gmail.com', '987 Maple Ave', '1986-05-11', NULL, 'GIF', 'EFG123', 'available', 'password123', 'new', NULL),
(NULL, 'Sophia', 'Gonzalez', 'F', '777888999', 'sophia.gonzalez@gmail.com', '654 Oak St', '1992-09-28', NULL, 'JPEG', 'HIJ456', 'available', 'password456', 'new', NULL),

(NULL, 'Alexander', 'Moore', 'M', '111222333', 'alexander.moore@gmail.com', '789 Pine Rd', '1993-08-14', NULL, 'JPEG','NJD123', 'available','password567', 'new', NULL),
(NULL, 'Ava', 'Anderson', 'F', '333444555', 'ava.anderson@gmail.com', '456 Cedar Ln', '1997-01-31', NULL, 'PNG','ECKD123','available', 'password890', 'new', NULL),
(NULL, 'Daniel', 'Lee', 'M', '555666777', 'daniel.lee@gmail.com', '987 Elm St', '1986-05-11', NULL, 'GIF','EFSDC23','available', 'password123', 'new', NULL),
(NULL, 'Mia', 'Taylor', 'F', '777888999', 'mia.taylor@gmail.com', '654 Oak St', '1992-09-28', NULL, 'JPEG','EFSC23','available', 'password456', 'new', NULL),
(NULL, 'Jackson', 'Hernandez', 'M', '222333444', 'jackson.hernandez@gmail.com', '321 Maple Ave', '1988-04-13', NULL, 'GIF','ESSG123','available', 'password789', 'new', NULL),
(NULL, 'Sophie', 'Lopez', 'F', '444555666', 'sophie.lopez@gmail.com', '789 Elm St', '1995-11-20', NULL, 'PNG','EFSD23','available', 'password012', 'new', NULL),
(NULL, 'Logan', 'Clark', 'M', '666777888', 'logan.clark@gmail.com', '456 Pine Rd', '1991-07-07', NULL, 'JPEG','SDC23','available', 'password345', 'new', NULL);


CREATE TABLE TMS_manager(

    emp_id VARCHAR(4) NOT NULL,
    f_name VARCHAR(15) NOT NULL,
    l_name VARCHAR(15) NOT NULL,
    sex CHAR(1) NOT NULL,
    tel_no VARCHAR(15) NOT NULL,
    email VARCHAR(15) NOT NULL,
    residence VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    emp_img LONGBLOB,
    emp_img_type VARCHAR(5) NOT NULL,
    acc_password VARCHAR(100) NOT NULL DEFAULT 'newUser',
    acc_status VARCHAR(10) NOT NULL DEFAULT 'new',
    last_login DATE,
    CHECK (sex IN ('M' or 'F')),
    CHECK (CHAR_LENGTH(acc_password) > 5),
    PRIMARY KEY (`emp_id`)
);
INSERT INTO TMS_manager (
    emp_id,
    f_name,
    l_name,
    sex,
    tel_no,
    email,
    residence,
    date_of_birth,
    emp_img,
    emp_img_type,
    acc_password,
    acc_status,
    last_login
)
VALUES
    ('003', 'Robert', 'Williams', 'M', '111222333', 'robert.williams@gmail.com', '789 Maple Ave', '1985-07-10', NULL, 'JPEG', 'password789', 'new', NULL),
    ('004', 'Olivia', 'Johnson', 'F', '444555666', 'olivia.johnson@gmail.com', '456 Elm St', '1991-03-22', NULL, 'PNG', 'password012', 'new', NULL),
    ('005', 'William', 'Brown', 'M', '777888999', 'william.brown@gmail.com', '321 Pine Rd', '1987-09-17', NULL, 'GIF', 'password345', 'new', NULL),
    ('006', 'Sophia', 'Davis', 'F', '222333444', 'sophia.davis@gmail.com', '987 Oak St', '1994-12-05', NULL, 'JPEG', 'password678', 'new', NULL),
    ('007', 'James', 'Miller', 'M', '555666777', 'james.miller@gmail.com', '654 Maple Ave', '1990-06-18', NULL, 'PNG', 'password901', 'new', NULL),
    ('008', 'Emma', 'Wilson', 'F', '999000111', 'emma.wilson@gmail.com', '321 Elm Ave', '1989-02-27', NULL, 'GIF', 'password234', 'new', NULL);


CREATE TABLE TMS_web_app_admin(

    emp_id VARCHAR(4) NOT NULL,
    f_name VARCHAR(15) NOT NULL,
    l_name VARCHAR(15) NOT NULL,
    sex CHAR(1) NOT NULL,
    tel_no VARCHAR(15) NOT NULL,
    email VARCHAR(15) NOT NULL,
    residence VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    emp_img LONGBLOB,
    emp_img_type VARCHAR(5) NOT NULL,
    acc_password VARCHAR(30) NOT NULL DEFAULT 'newUser',
    last_login DATE,
    CHECK (sex IN ('M' or 'F')),
    CHECK (CHAR_LENGTH(acc_password) > 5),
    PRIMARY KEY (`emp_id`)
);

INSERT INTO TMS_web_app_admin (
    emp_id,
    f_name,
    l_name,
    sex,
    tel_no,
    email,
    residence,
    date_of_birth,
    emp_img,
    emp_img_type,
    acc_password,
    last_login
)
VALUES
    ('E006', 'Emily', 'Anderson', 'F', '555666777', 'emily.anderson@gmail.com', '987 Elm St', '1986-05-11', NULL, 'GIF', 'password345', NULL),
    ('E007', 'Benjamin', 'Clark', 'M', '777888999', 'benjamin.clark@gmail.com', '654 Oak St', '1992-09-28', NULL, 'JPEG', 'password678', NULL),
    ('E008', 'Ava', 'Taylor', 'F', '111222333', 'ava.taylor@gmail.com', '321 Maple Ave', '1988-04-13', NULL, 'GIF', 'password901', NULL);

CREATE TABLE TMS_truck(

    no_plate VARCHAR(10) NOT NULL,
    max_capacity VARCHAR(10) NOT NULL,
    model VARCHAR(10) NOT NULL,
    current_status TEXT DEFAULT 'Parked',
    PRIMARY KEY (`no_plate`)
);
INSERT INTO TMS_truck (
    no_plate,
    max_capacity,
    model,
    current_status
)
VALUES
    ('ABC123', '10 tons', 'Model A', 'In Transit'),
    ('DEF456', '8 tons', 'Model B', 'Parked'),
    ('GHI789', '12 tons', 'Model C', 'In Repair'),
    ('JKL012', '6 tons', 'Model D', 'Parked'),
    ('MNO345', '15 tons', 'Model E', 'In Transit'),
    ('PQR678', '9 tons', 'Model F', 'Parked'),
    ('STU901', '11 tons', 'Model G', 'In Repair'),
    ('VWX234', '7 tons', 'Model H', 'Parked'),
    ('YZA567', '14 tons', 'Model I', 'In Transit'),
    ('BCD890', '8 tons', 'Model J', 'Parked'),
    ('EFG123', '13 tons', 'Model K', 'In Repair'),
    ('HIJ456', '9 tons', 'Model L', 'Parked'),
    ('KLM789', '11 tons', 'Model M', 'In Transit'),
    ('NOP012', '5 tons', 'Model N', 'Parked'),
    ('QRS345', '10 tons', 'Model O', 'In Repair');


CREATE TABLE TMS_customer(

    customer_id VARCHAR(4) NOT NULL,
    customer_name VARCHAR(15) NOT NULL,
    `name` VARCHAR(15) NOT NULL,
    customer_type VARCHAR(10) DEFAULT 'Business',
    sex CHAR(1),
    tel_no VARCHAR(15) NOT NULL,
    email VARCHAR(15) NOT NULL,
    `location` VARCHAR(100) NOT NULL,
    CHECK (sex IN ('M' or 'F')),
    PRIMARY KEY (`customer_id`)
);
INSERT INTO TMS_customer (
    customer_id,
    customer_name,
    `name`,
    customer_type,
    sex,
    tel_no,
    email,
    `location`
)
VALUES
    ('011', 'Ethan Johnson', 'Ethan', 'Business', 'M', '777777777', 'ethan.johnson@gmail.com', '789 Pine St'),
    ('012', 'Mia Thompson', 'Mia', 'Individual', 'F', '888888888', 'mia.thompson@gmail.com', '321 Oak St'),
    ('013', 'Samuel Rodriguez', 'Samuel', 'Business', 'M', '999999999', 'samuel.rodriguez@gmail.com', '456 Cedar Ln'),
    ('014', 'Lily Turner', 'Lily', 'Individual', 'F', '222111333', 'lily.turner@gmail.com', '987 Maple Ave'),
    ('015', 'Benjamin Davis', 'Benjamin', 'Business', 'M', '333222111', 'benjamin.davis@gmail.com', '654 Elm St'),
    ('016', 'Grace Martinez', 'Grace', 'Individual', 'F', '444333222', 'grace.martinez@gmail.com', '789 Oak St'),
    ('017', 'Henry Wilson', 'Henry', 'Business', 'M', '555444333', 'henry.wilson@gmail.com', '321 Pine Rd'),
    ('018', 'Scarlett Clark', 'Scarlett', 'Individual', 'F', '666555444', 'scarlett.clark@gmail.com', '654 Cedar Ln');

CREATE TABLE TMS_order(

    order_id VARCHAR(4) NOT NULL,
    order_qty INT NOT NULL,
    order_desc TEXT NOT NULL,
    order_date DATE NOT NULL,
    due_date DATE NOT NULL,
    delivery_location VARCHAR(100) NOT NULL,
    order_status TEXT DEFAULT 'Unassigned',
    customer_id VARCHAR(4) NOT NULL,
    PRIMARY KEY (`order_id`),
    FOREIGN KEY (`customer_id`) REFERENCES TMS_customer(`customer_id`)
);

INSERT INTO TMS_order VALUES 
('EK01', 500, "DELIVERY TO HAM CONSTRUCTION SITE", "2023-06-6", "2023-06-23", 'Kampala, Kamapla road', 'completed', '011'),
('EK02', 450, "DELIVERY TO ROKO CONSTRUCTIONS", "2023-07-3", "2023-07-7", 'Nsambya, Kevian road', 'not completed', '012'),
('EK03', 280, "DELIVERY TO MUKWANO INDUSTRIES", "2023-11-6", "2023-11-11", 'Kampala, Mukwano road', 'not completed', '014'),
('EK04', 1000, "DELIVERY TO HOPE CLINIC EXTENSION SITE", "2023-03-9", "2023-03-12", 'Kampala, Makindye road', 'completed', '013'),
('EK05', 700, "DELIVERY TO NSAMBYA HOSPITAL NEW WING", "2023-07-4", "2023-07-7", 'Nsambya, Nsambya road', 'not completed', '016'),
('EK06', 3900, "DELIVERY TO CRANE TOWERS", "2023-06-6", "2023-06-8", 'Kampala, Jinja road', 'completed', '013'),
('EK07', 523, "DELIVERY TO KABOJJA", "2023-08-6", "2023-08-10", 'Busega, Konge road', 'not completed', '014'),
('EK08', 5023, "DELIVERY TO MUYENGA BUILDING SITE", "2023-01-6", "2023-01-8", 'Kampala, Muyenga road', 'completed', '012'),
('EK09', 50, "DELIVERY TO JOMAYI ESTATES", "2023-06-4", "2023-06-6", 'Masaka, Masaka road', 'completed', '017'),
('EK10', 540, "DELIVERY TO MIREMBE VILLAS", "2023-06-3", "2023-06-10", 'Kigo, Kigo road', 'completed', '018'),
('EK11', 130, "DELIVERY TO KPC ", "2023-06-6", "2023-06-9", 'Kansanga, Rohn road', 'not completed', '013');

INSERT INTO TMS_delivery (
    delivery_id,
    delivery_date_start,
    delivery_date_end,
    delivery_status,
    order_id,
    emp_id,
    truck_no_plate
)
VALUES
    ('D001', "2023-07-3", "2023-07-5", 'Not completed', 'EK02', 'E004', 'ABC123'),
    ('D002', "2023-11-6", "2023-11-8", 'Not completed', 'EK03', 'E005', 'DEF456'),
    ('D003', "2023-03-9", "2023-03-11", 'completed', 'EK04', 'E006', 'GHI789'),
    ('D004', "2023-07-4", "2023-07-6", 'Not completed', 'EK05', 'E007', 'JKL012'),
    ('D005', "2023-06-6", "2023-06-8", 'completed', 'EK06', 'E008', 'MNO345');

CREATE TABLE TMS_delivery(

    delivery_id VARCHAR(4) NOT NULL,
    delivery_date_start DATE NOT NULL,
    delivery_date_end DATE NOT NULL,
    delivery_status TEXT DEFAULT 'Not completed',
    order_id VARCHAR(4) NOT NULL,
    emp_id VARCHAR(4) NOT NULL,
    truck_no_plate VARCHAR(10) NOT NULL,
    PRIMARY KEY (`delivery_id`),
    FOREIGN KEY (`order_id`) REFERENCES TMS_order(`order_id`),
    FOREIGN KEY (`emp_id`) REFERENCES TMS_driver(`emp_id`),
    FOREIGN KEY (`truck_no_plate`) REFERENCES TMS_truck(`no_plate`)
);



-- CREATING INSERTION SEQUENCE
CREATE SEQUENCE emp_id_sequence START WITH 1 INCREMENT BY 1;

-- CREATING THE TRIGGER FOR FORMATTING id VALUES

DELIMITER //
CREATE TRIGGER `before_insert_emp_driver`BEFORE INSERT ON `TMS_driver` FOR EACH ROW 
BEGIN
SET NEW.emp_id = CONCAT('E', LPAD(NEXT VALUE FOR `emp_id`, 3, '0'));
END //
DELIMITER;

-- checking for the trigger

SELECT TRIGGER_NAME, EVENT_OBJECT_TABLE, ACTION_TIMING, ACTION_STATEMENT
FROM INFORMATION_SCHEMA.TRIGGERS
WHERE EVENT_OBJECT_TABLE = 'TMS_driver';

-- show sequences
SELECT sequence_schema, sequence_name
FROM information_schema.sequences;


--------------------

CREATE SEQUENCE emp_id_web START WITH 1 INCREMENT BY 1;

DELIMITER //
CREATE TRIGGER `before_insert_emp_admin`BEFORE INSERT ON `tms_web_app_admin` FOR EACH ROW 
BEGIN
SET NEW.emp_id = CONCAT('E', LPAD(NEXT VALUE FOR `emp_id_web`, 3, '0'));
END //
