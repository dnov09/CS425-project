-- Relational Schema for D3 Groceries
CREATE TABLE staff(
    s_id serial PRIMARY KEY,
    "first_name" VARCHAR(20) NOT NULL,
    "last_name" VARCHAR(20) NOT NULL,
    "job_title" VARCHAR(50),
    salary NUMERIC(8,2)
);

CREATE TABLE customer(
    c_id serial PRIMARY KEY,
    "first_name" VARCHAR(20) NOT NULL,
    "last_name" VARCHAR(20) NOT NULL,
    balance NUMERIC(8,2) CHECK (balance >= 0)
);

CREATE table ccard(
    cc_id serial PRIMARY KEY,
    "cc_number" 
)