	use db_managesystem
	show tables
	-- 用户表 flag=1:店长   =0 店员
	create table tb_user(username varchar(15) primary key,password varchar(64),flag int not null);

	insert into tb_user values("123","123",1)
	-- 账目表 isrepay=1 已经还款  =0 没还款
 	create table tb_accounts(aid int primary key auto_increment, aitem text, aitem_money, isrepay int, atime datetime);
	-- 商品类型表 tid 1:香烟 2白酒 3红酒 4啤酒 5饮料
	create table tb_type(tid int primary key, tname varchar(10), small_unit varchar(4), big_unit varchar(4));
	$sql = "insert into tb_type values(1,'香烟','盒','条')";
	$sql = "insert into tb_type values(2,'白酒','瓶','件')";
	$sql = "insert into tb_type values(3,'红酒','瓶','件')";
	$sql = "insert into tb_type values(4,'啤酒','瓶','箱')";
	$sql = "insert into tb_type values(5,'饮料','瓶','箱')";   
	select * from tb_type;
	-- 商品表  
	create table tb_commodity(cid int primary key auto_increment, cname varchar(30), ccost float(8,2), 
		csticker_price float(8,2), cnum int unsigned, cunit_value int, 
		tid int, foreign key(tid) references tb_type(tid));
	insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values();
	insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values("congrong",10,13,20,10,1);
	insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values("zhonghua",40,10,10,10,1);
	insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values("kele",2,3,10,10,5);
	insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values("qingdao",5,8,10,10,4);
	update tb_commodity set cnum=cnum+;
	-- 损耗表
	create table tb_destroy(did int primary key auto_increment,cid int,dnum int,statement text,foreign key(cid) references tb_commodity(cid));

	-- 销售表 
	
	insert into tb_sale(cid,sale_price,snum,username,stime) values(17,13,1,"123",now());
	insert into tb_sale(cid,sale_price,snum,username,stime) values(19,3,2,"123",now());
	-- 查询
	--查询商品信息
	select cname as text,tname,small_unit,cnum,ccost,csticker_price from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid;

	-- 销售表——新
	create table tb_sale(sid varchar(20) primary key,sale_money float(10,2),get_money float(10,2),itemnum int,username varchar(15),
		stime datetime,foreign key(username) references tb_user(username));
	create table tb_saledetails(sid varchar(20),cid int,snum int,sale_price float(8,2),foreign key(sid) references tb_sale(sid),foreign key(cid) references tb_commodity(cid));
	insert into tb_sale values(sid,sale_money,get_money,itemnum,username,now())
	insert into tb_saledetails(sid,cid,snum,sale_price)
	update tb_commodity set cnum=cnum-;
		delete from tb_saledetails;
		delete from tb_sale;
		select * from tb_sale;
		select * from tb_saledetails;

select count(showtime) from (select date_format(stime,'%Y-%m-%d') as showtime,sum(sale_money)
from tb_sale where stime>"2016-10-21" group by year(stime), month(stime),day(stime)) as a;

select count(*) from ( select sum(sale_money) from tb_sale where stime>"2016-10-21" group by year(stime), month(stime),day(stime)) as a;
select date_format(stime,'%Y-%m-%d') as showtime,sum(sale_money)
from tb_sale where stime>"2016-10-21" group by year(stime), month(stime),day(stime) order by showtime desc

select sum(sale_money) from tb_sale where stime>"2016-10-25 00:00:00" and stime<now()

