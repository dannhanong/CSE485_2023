create database BTTH01_CSE485;

use BTTH01_CSE485;

CREATE TABLE tacgia (
    ma_tgia INT UNSIGNED PRIMARY KEY,
    ten_tgia VARCHAR(100) NOT NULL,
    hinh_tgia VARCHAR(100)
);

CREATE TABLE baiviet (
    ma_bviet INT UNSIGNED PRIMARY KEY,
    tieude VARCHAR(200) NOT NULL,
    ten_bhat VARCHAR(100) NOT NULL,
    ma_tloai INT UNSIGNED NOT NULL,
    tomtat TEXT NOT NULL,
    noidung TEXT,
    ma_tgia INT UNSIGNED,
    ngayviet DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    hinhanh VARCHAR(200)
);

CREATE TABLE theloai (
    ma_tloai INT UNSIGNED PRIMARY KEY,
    ten_tloai VARCHAR(50) NOT NULL
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

-- Thêm dữ liệu cho bảng "tacgia"

INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (1, "Nhacvietplus");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (2, "Sưu tầm");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (3, "Sandy");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (4, "Lê Trung Ngân");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (5, "Khánh Ngọc");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (6, "Night Stalker");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (7, "Phạm Phương Anh");
INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (8, "Tâm tình");

-- Thêm dữ liệu cho bảng "theloai"

INSERT INTO theloai VALUE (1, "Nhạc trẻ");
INSERT INTO theloai VALUE (2, "Nhạc trữ tình");
INSERT INTO theloai VALUE (3, "Nhạc cách mạng");
INSERT INTO theloai VALUE (4, "Nhạc thiếu nhi");
INSERT INTO theloai VALUE (5, "Nhạc quê hương");
INSERT INTO theloai VALUE (6, "POP");
INSERT INTO theloai VALUE (7, "Rock");
INSERT INTO theloai VALUE (8, "R&B");

-- Thêm dữ liệu cho bảng "baiviet"

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
1, 
"Lòng mẹ", "Lòng mẹ", 2,
"Và mẹ ơi đừng khóc nhé! Cả đời này mẹ đã khóc nhiều lắm rồi, hãy cười lên vì con đã trưởng thành! Con sẽ lại về dậy sớm nấu cơm cho mẹ, nấu nước cho mẹ tắm như ngày xưa. \“Dù cho vai nắng nhưng lòng thương chẳng nhạt màu, vẫn mơ quay về vui vầy dưới bóng mẹ yêu\”", 	
1, "2012/7/23"
);

INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
2, 
"Cảm ơn em đã rời xa anh", "Vết mưa", 2,
"Cảm ơn em đã cho anh những tháng ngày hạnh phúc, cho anh biết yêu và được yêu. Em cho anh được nếm trải hương vị ngọt ngào của tình yêu nhưng cũng đầy đau khổ và nước mắt. Những tháng ngày đó có lẽ suốt cuộc đời anh không bao giờ quên", 	
3, "2012/2/12"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
3,
"Cuộc đời có mấy ngày mai?", "Phôi pha", 2, 
"Đêm nay, trời quang mây tạnh, trong người nghe hoang vắng và tôi ngồi đây \“Ôm lòng đêm, Nhìn vầng trăng mới về\” mà ngậm ngùi \“Nhớ chân giang hồ. Ôi phù du, từng tuổi xuân đã già\”", 
4, "2014/3/13"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
4, 
"Quê tôi!", "Quê hương", 5,
"Quê hương là gì mà chở đầy kí ức nhỏ xinh. Có đám trẻ nô đùa bên nhau dưới gốc ổi nhà bà Năm giữa trưa nắng gắt chỉ để chờ bà đi vắng là hái trộm. Có hai anh em tôi bì bõm lội sình bắt cua đem về nhà cho mẹ nấu canh, nấu cháo… Có ba chị em tôi lục đục tự nấu ăn khi mẹ vắng nhà. Có anh tôi luôn dắt tôi đi cùng đường ngõ xóm chỉ để em được vui. Có cả những trận cãi nhau nảy lửa của ba anh em nữa…",
5, "2014/2/20"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
5, 
"Đất nước", "Đất nước", 5,
"Đã bao nhiêu lần tôi tự hỏi: liệu trên Thế giới này có nơi nào chiến tranh tang thương mà lại rất đổi anh hùng như nước mình không? Liệu có mảnh đất nào mà mỗi tấc đất hôm nay đã thấm máu xương của những thế hệ đi trước nhiều như nước mình không? Và, liệu có một đất nước nào lại có nhiều bà mẹ đau khổ nhưng cũng hết sức gan góc như đất nước mình không?",
1, "2010/5/25"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
6, 
"Hard Rock Hallelujah", "Hard Rock Hallelujah", 7,
"Những linh hồn đang lạc lối, mù quáng mất phương hướng trong cõi trần gian đầy nghiệt ngã hãy nên lắng nghe \"Hard Rock Hallelujah\" để có thể quên tất cả mọi thứ để tìm về đúng bản chất sâu thẳm nhất trong tâm hồn chính mình!",
6, "2013/9/12"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
7, 
"The Unforgiven", "The Unforgiven", 7,
"Lâu lắm rồi mới nghe lại The Unforgiven II, vì bài này không phải là bài mà tôi thích. Anh bạn tôi lúc trước, đi đâu cũng nghêu ngao bài này ấy, chỉ tại vì hắn đang... thất tình mà lị. Mà sao Metallica có The Unforgiven rồi lại có thêm bài này chi nữa vậy không biết nữa, làm cho tôi cảm thấy hình như hơi bị đúng so với tâm trạng của tôi lúc này.",
1, "2010/5/25"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
8, 
"Nơi tình yêu bắt đầu", "Nơi tình yêu bắt đầu", 1,
"Nhiều người sẽ nghĩ làm gì có yêu nhất và làm gì có yêu mãi. Ừ! Chẳng có gì là mãi mãi cả, vì chúng ta không trường tồn vĩnh cửu",
1, "2014/2/3"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
9, 
"Love Me Like There’s No Tomorrow", "Love Me Like There’s No Tomorrow", 8,
"Nếu ai đã từng yêu Queen, yêu cái chất giọng cao, sắc sảo như một vết cắt thật ngọt ẩn giấu bao cảm xúc mãnh liệt của Freddie chắc không thể không \"điêu đứng\" mỗi khi nghe Love Me Like There’s No Tomorrow.",
1, "2013/2/26"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
10, 
"I\'m stronger", "I\'m stronger", 7,
"Em không phải là người giỏi giấu cảm xúc, nhưng em lại là người giỏi đoán biết cảm xúc của người khác vậy nên đừng cố nói nhớ em, rằng mọi thứ chỉ là do hoàn cảnh. Và cũng đừng dối em rằng anh đã từng yêu em. Em nhắm mắt cũng cảm nhận được mà, thật đấy",
2, "2013/8/21"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
11, 
"Ôi Cuộc Sống Mến Thương", "Ôi Cuộc Sống Mến Thương", 5,
"Có một câu nói như thế này \"Âm nhạc là một cái gì khác lạ mà hầu như tôi muốn nói nó là một phép thần diệu.Vì nó đứng giữa tư tưởng và hiện tượng, tinh thần và vật chất, mọi thứ trung gian mơ hồ thế đó mà không là thế đó giữa các sự vật mà âm nhạc hòa giải\"",
2, "2011/10/9"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
12, 
"Cây và gió", "Cây và gió", 7,
"Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.",
7, "2013/12/5"
);


INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet)
VALUES (
13,
"Như một cách tạ ơn đời", "Người thầy", 2,
"Ánh nắng cuối ngày rồi cũng sẽ tắt, dòng sông con đò rồi cũng sẽ rẽ sang một hướng khác. Nhưng việc trồng người luôn cảm thụ với chuyến đò ngang, cứ tần tảo đưa rồi lặng lẽ quay về đưa sang. Con đò năm xưa của Thầy nặng trĩu yêu thương, hy sinh thầm lặng.",
8, "2014/1/2"
);

-- l) Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web
CREATE TABLE users (
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
DELIMITER //

ALTER TABLE theloai
ADD COLUMN SLBaiViet INT DEFAULT 0; -- chay lenh them truoc

CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
   UPDATE theloai
   SET SLBaiViet = SLBaiViet + 1
   WHERE ma_tloai = NEW.ma_tloai;
END //

DELIMITER ;
