-- Created by Vertabelo (http://vertabelo.com)
-- Script type: create
-- Scope: [tables, references, sequences, views, procedures]
-- Generated at Thu Feb 26 17:58:17 UTC 2015




-- tables
-- Table advertise
CREATE TABLE advertise (
    id int    AUTO_INCREMENT,
    descr text    NULL ,
    users_id int    NOT NULL ,
    foto1 varchar(100)    NOT NULL ,
    data_pub date    NOT NULL ,
    data_mod date NULL,
    CONSTRAINT advertise_pk PRIMARY KEY (id)
);

-- Table rol
CREATE TABLE rol (
    id int   AUTO_INCREMENT,
    rol varchar(10)    NOT NULL ,
    CONSTRAINT rol_pk PRIMARY KEY (id)
);

-- Table sessions
CREATE TABLE sessions (
    id int   AUTO_INCREMENT,
    users_id int    NOT NULL ,
    created timestamp    NULL ,
    sessid char(32)    NULL ,
    CONSTRAINT sessions_pk PRIMARY KEY (id)
);

-- Table users
CREATE TABLE users (
    id int    AUTO_INCREMENT,
    name varchar(30)    NULL ,
    password varchar(64)  NOT  NULL ,
    email varchar(60)  NOT  NULL ,
    rol int    NOT NULL ,
    CONSTRAINT users_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  advertise_users (table: advertise)


ALTER TABLE advertise ADD CONSTRAINT advertise_users FOREIGN KEY advertise_users (users_id)
    REFERENCES users (id)
    ON DELETE CASCADE;
-- Reference:  sessions_users (table: sessions)


ALTER TABLE sessions ADD CONSTRAINT sessions_users FOREIGN KEY sessions_users (users_id)
    REFERENCES users (id);
-- Reference:  users_rol (table: users)


ALTER TABLE users ADD CONSTRAINT users_rol FOREIGN KEY users_rol (rol)
    REFERENCES rol (id);



-- End of file.
