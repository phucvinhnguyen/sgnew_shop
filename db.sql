create database sgnew_db;
use sgnew_db;

create table customer (
    id int primary key not null auto_increment,
    full_name varchar(64) not null,
    address varchar(128),
    phone varchar(16) not null
);

create table refraction_error (
    id int primary key not null auto_increment,
    title varchar(64) not null
);

create table lens (
    id int primary key not null auto_increment,
    title varchar(64) not null
);

create table customer_info (
    id int primary key not null auto_increment,
    customer_id int not null,
    lens_id int not null,
    refraction_error_id int not null,
    left_eye varchar(64),
    right_eye varchar(64),
    view_far varchar(64),
    read_book varchar(64),
    created_at timestamp default current_timestamp,
    foreign key (lens_id) references lens(id),
    foreign key (customer_id) references customer(id),
    foreign key (refraction_error_id) references refraction_error(id)
);

create table product (
    id int primary key not null auto_increment,
    customer_id int not null,
    title varchar(128) not null,
    price int not null,
    reserved_price int not null default 0,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp,
    foreign key (customer_id) references customer(id)
);