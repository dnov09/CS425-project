-- Relational Schema for D3 Groceries
CREATE TABLE staff
(
    s_id serial PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    address_id serial,
    job_title VARCHAR(50),
    salary NUMERIC(8,2),

    FOREIGN KEY (address_id) REFERENCES not_keyword_address
);

CREATE TABLE customer
(
    c_id serial PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    address_id serial,
    balance NUMERIC(8,2) CHECK (balance >= 0),

    FOREIGN KEY (address_id) REFERENCES not_keyword_address

);

CREATE TABLE ccard
(
    c_id serial PRIMARY KEY,
    cc_number VARCHAR(256),
    cc_expiration VARCHAR(256),
    cvv VARCHAR(3),

    FOREIGN KEY (c_id) REFERENCES customer
);

CREATE TABLE product
(
    p_id serial PRIMARY KEY,
    p_name VARCHAR(256),
    p_type VARCHAR(256),
    nutrition VARCHAR(256),
    alcohol_cont VARCHAR (256),
    size INT CHECK(size > 0)
);

CREATE TABLE stock
(
    p_id serial PRIMARY KEY,
    quantity INTEGER CHECK(quantity >= 0),

    FOREIGN KEY (p_id) REFERENCES product
);

CREATE TABLE warehouse
(
    w_id serial PRIMARY KEY,
    p_id serial PRIMARY KEY,
    address_id serial,
    not_keyword_address VARCHAR(256),
    quantity INTEGER CHECK(quantity >= 0),
    -- Foreign key constraints
    FOREIGN KEY (p_id) REFERENCES product,
    FOREIGN KEY (address_id) REFERENCES not_keyword_address

);

-- order is a keyword in SQL so we add 'not_keyword_'
CREATE TABLE not_keyword_order
(
    order_id serial PRIMARY KEY,
    c_id serial,
    cc_id serial,
    p_id serial,
    address_id serial,
    not_keyword_status VARCHAR(10),
    CHECK (not_keyword_status in('ordered', 'sent', 'received')),
    -- Foreign key constraints
    FOREIGN KEY (c_id) REFERENCES customer,
    FOREIGN KEY (cc_id) REFERENCES ccard,
    FOREIGN KEY (address_id) REFERENCES not_keyword_address
);


CREATE TABLE not_keyword_address
(
    address_id serial PRIMARY KEY,
    street_name VARCHAR(256),
    city VARCHAR(256),
    not_keyword_state VARCHAR(2),
    zipcode VARCHAR(5)
);