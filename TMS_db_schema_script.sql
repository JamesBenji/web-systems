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
    `emp_img_type` VARCHAR(5) NOT NULL,
    `permit_no` VARCHAR(20) NOT NULL,
    work_status VARCHAR(10) NOT NULL,

    acc_password VARCHAR(100) NOT NULL DEFAULT 'newUser',
    acc_status VARCHAR(10) NOT NULL DEFAULT 'new',
    last_login DATE,
    CHECK (sex IN ('M' or 'F')),
    CHECK (CHAR_LENGTH(acc_password) > 5),
    PRIMARY KEY (`emp_id`)
);

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
    acc_password VARCHAR(30) NOT NULL DEFAULT 'newUser',
    last_login DATE,
    CHECK (sex IN ('M' or 'F')),
    CHECK (CHAR_LENGTH(acc_password) > 5),
    PRIMARY KEY (`emp_id`)
);

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

CREATE TABLE TMS_truck(

    no_plate VARCHAR(10) NOT NULL,
    max_capacity VARCHAR(10) NOT NULL,
    model VARCHAR(10) NOT NULL,
    current_status TEXT DEFAULT 'Parked',
    PRIMARY KEY (`no_plate`)
);

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
SET NEW.emp_id = CONCAT('E', LPAD(NEXT VALUE FOR `emp_id_sequence`, 4, '0'));
END //
DELIMITER;

-- checking for the trigger

SELECT TRIGGER_NAME, EVENT_OBJECT_TABLE, ACTION_TIMING, ACTION_STATEMENT
FROM INFORMATION_SCHEMA.TRIGGERS
WHERE EVENT_OBJECT_TABLE = 'TMS_driver';

--DATA ENTRY

INSERT INTO `TMS_driver` (emp_id, f_name, l_name, tel_no, email, sex, residence, date_of_birth, emp_img, emp_img_type, permit_no, work_status, acc_password, acc_status, last_login) 
VALUES ('E001', 'John', 'Mark', '0700020136','jmakr@gmail' , 'M', 'Makindye', '12-04-2002',NULL, 'jpg', '1001001001', 'available', NULL, 'New', NULL);