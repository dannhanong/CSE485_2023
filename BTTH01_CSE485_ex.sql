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

-- Thêm dữ liệu cho bảng "tacgia"

INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES
(1, 'Tác giả 1', 'hinh_tac_gia_1.jpg'),
(2, 'Tác giả 2', 'hinh_tac_gia_2.jpg'),
(3, 'Tác giả 3', 'hinh_tac_gia_3.jpg'),
(4, 'Tác giả 4', NULL),
(5, 'Tác giả 5', 'hinh_tac_gia_5.jpg'),
(6, 'Tác giả 6', 'hinh_tac_gia_6.jpg'),
(7, 'Tác giả 7', 'hinh_tac_gia_7.jpg'),
(8, 'Tác giả 8', NULL),
(9, 'Tác giả 9', 'hinh_tac_gia_9.jpg'),
(10, 'Tác giả 10', 'hinh_tac_gia_10.jpg');

--Thêm dữ liệu cho bảng "theloai"

INSERT INTO theloai (ma_tloai, ten_tloai) VALUES
(1, 'Thể loại 1'),
(2, 'Thể loại 2'),
(3, 'Thể loại 3'),
(4, 'Thể loại 4'),
(5, 'Thể loại 5'),
(6, 'Thể loại 6'),
(7, 'Thể loại 7'),
(8, 'Thể loại 8'),
(9, 'Thể loại 9'),
(10, 'Thể loại 10');

--Thêm dữ liệu cho bảng "baiviet"

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES
(1, 'Tiêu đề 1', 'Bài hát 1', 1, 'Tóm tắt bài viết 1', 'Nội dung bài viết 1', 1, '2023-11-29 12:00:00', 'hinh_bai_viet_1.jpg'),
(2, 'Tiêu đề 2', 'Bài hát 2', 2, 'Tóm tắt bài viết 2', 'Nội dung bài viết 2', 2, '2023-11-30 10:30:00', 'hinh_bai_viet_2.jpg'),
(3, 'Tiêu đề 3', 'Bài hát 3', 1, 'Tóm tắt bài viết 3', 'Nội dung bài viết 3', 3, '2023-12-01 15:45:00', 'hinh_bai_viet_3.jpg'),
(4, 'Tiêu đề 4', 'Bài hát 4', 3, 'Tóm tắt bài viết 4', 'Nội dung bài viết 4', 4, '2023-12-02 08:00:00', 'hinh_bai_viet_4.jpg'),
(5, 'Tiêu đề 5', 'Bài hát 5', 2, 'Tóm tắt bài viết 5', 'Nội dung bài viết 5', 5, '2023-12-03 14:20:00', 'hinh_bai_viet_5.jpg'),
(6, 'Tiêu đề 6', 'Bài hát 6', 4, 'Tóm tắt bài viết 6', 'Nội dung bài viết 6', 6, '2023-12-04 11:10:00', 'hinh_bai_viet_6.jpg'),
(7, 'Tiêu đề 7', 'Bài hát 7', 3, 'Tóm tắt bài viết 7', 'Nội dung bài viết 7', 7, '2023-12-05 17:30:00', 'hinh_bai_viet_7.jpg'),
(8, 'Tiêu đề 8', 'Bài hát 8', 5, 'Tóm tắt bài viết 8', 'Nội dung bài viết 8', 8, '2023-12-06 09:45:00', 'hinh_bai_viet_8.jpg'),
(9, 'Tiêu đề 9', 'Bài hát 9', 4, 'Tóm tắt bài viết 9', 'Nội dung bài viết 9', 9, '2023-12-07 13:15:00', 'hinh_bai_viet_9.jpg'),
(10, 'Tiêu đề 10', 'Bài hát 10', 2, 'Tóm tắt bài viết 10', 'Nội dung



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
