create database BTTH01_CSE485;

use BTTH01_CSE485;

CREATE TABLE tacgia (
    ma_tgia INT UNSIGNED PRIMARY KEY,
    ten_tgia NVARCHAR(100) NOT NULL,
    hinh_tgia NVARCHAR(100)
);

CREATE TABLE baiviet (
    ma_bviet INT UNSIGNED PRIMARY KEY,
    tieude NVARCHAR(200) NOT NULL,
    ten_bhat NVARCHAR(100) NOT NULL,
    ma_tloai INT UNSIGNED NOT NULL,
    tomtat TEXT NOT NULL,
    noidung TEXT,
    ma_tgia INT UNSIGNED,
    ngayviet DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    hinhanh NVARCHAR(200)
);

CREATE TABLE theloai (
    ma_tloai INT UNSIGNED PRIMARY KEY,
    ten_tloai NVARCHAR(50) NOT NULL
);
