INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('金子','test1@test.jp','test1',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('田中','test2@test.jp','test2',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('鈴木','test3@test.jp','test1',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('金子','test4@test.jp','test2',sysdate());
INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES('渡辺','test11@test.jp','test1',sysdate());

INSERT INTO gs_an_table(name,email,naiyou,indate)VALUES(:name', :email'test11@test.jp','test1',sysdate());


-- ; はなくてもいいが、複数入れるときはあった方がいい
SELECT * FROM gs_an_table;
SELECT * FROM gs_an_table;

-- データの指定した取り方
SELECT id,name FROM gs_an_table;

-- 条件　idが3の人のデータのみ取得
SELECT * FROM gs_an_table WHERE id=3;

-- 並び替え
SELECT * FROM gs_an_table ORDER BY id DESC;


SELECT * FROM gs_an_table WHERE email LIKE '%test1%';
-- 前方一致
SELECT * FROM テーブル名 WHERE indate LIKE ’2015-06%'; 

-- 後方一致
SELECT * FROM テーブル名 WHERE email LIKE ’%@gmail.com';

-- 部分一致
SELECT * FROM テーブル名 WHERE email LIKE ‘%@%';

SELECT * FROM gs_table_WHERE