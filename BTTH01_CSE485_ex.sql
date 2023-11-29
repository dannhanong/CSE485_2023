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

-- Thiết lập ràng buộc cho bảng "baiviet"
ALTER TABLE baiviet
ADD CONSTRAINT fk_bviet_tloai
FOREIGN KEY (ma_tloai)
REFERENCES theloai(ma_tloai);

ALTER TABLE baiviet
ADD CONSTRAINT fk_bviet_tgia
FOREIGN KEY (ma_tgia)
REFERENCES tacgia(ma_tgia);

-- Thiết lập ràng buộc cho bảng "theloai"
ALTER TABLE baiviet
ADD CONSTRAINT fk_bviet_tloai
FOREIGN KEY (ma_tloai)
REFERENCES theloai(ma_tloai);



-- Truy vấn

-- a) Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình
SELECT * FROM baiviet
WHERE ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai = 'Nhạc trữ tình');

-- b) Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT * FROM baiviet
WHERE ma_tgia = (SELECT ma_tgia FROM tacgia WHERE ten_tgia = 'Nhacvietplus');

-- c) Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT * FROM theloai
WHERE ma_tloai NOT IN (SELECT DISTINCT ma_tloai FROM baiviet WHERE tomtat IS NOT NULL);

-- d) Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên thể loại, ngày viết
SELECT baiviet.ma_bviet, tieude, ten_bhat, ten_tgia, ten_tloai, ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

-- e) Tìm thể loại có số bài viết nhiều nhất
SELECT ten_tloai, COUNT(*) AS so_bai_viet
FROM baiviet
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
GROUP BY ten_tloai
ORDER BY so_bai_viet DESC
LIMIT 1;

-- f) Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT ten_tgia, COUNT(*) AS so_bai_viet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
GROUP BY ten_tgia
ORDER BY so_bai_viet DESC
LIMIT 2;

-- g) Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”
SELECT *
FROM baiviet
WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

-- h) Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%'
   OR ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

-- i) Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả
CREATE VIEW vw_Music AS
SELECT baiviet.ma_bviet, tieude, ten_bhat, ten_tgia, ten_tloai, ngayviet
FROM baiviet
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai;

-- j) Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi
DELIMITER //
CREATE PROCEDURE sp_DSBaiViet (IN ten_theloai VARCHAR(50))
BEGIN
   DECLARE tloai_id INT UNSIGNED;
   SELECT ma_tloai INTO tloai_id FROM theloai WHERE ten_tloai = ten_theloai;
   IF tloai_id IS NULL THEN
      SIGNAL SQLSTATE '45000'
         SET MESSAGE_TEXT = 'Thể loại không tồn tại.';
   ELSE
      SELECT * FROM baiviet WHERE ma_tloai = tloai_id;
   END IF;
END //
DELIMITER ;

-- k) Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo
ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0;

CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
   UPDATE theloai
   SET SLBaiViet = SLBaiViet + 1
   WHERE ma_tloai = NEW.ma_tloai;
END;

-- l) Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web
CREATE TABLE users (
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
