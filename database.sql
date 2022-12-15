create database ma_bd;
use ma_bd;

create table livre (
    id_livre int primary key auto_increment,
    titre varchar(255),
    image_url text
);