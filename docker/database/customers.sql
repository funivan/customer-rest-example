create table customers
(
    "id" varchar(256) not null primary key,
    "email" varchar(256) not null,
    "name"  varchar(256) not null,
    "last_name" varchar(256) null,
    "update_time" bigint not null
);

