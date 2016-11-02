	use db_managesystem
	show tables
	-- 用户表 flag=1:店长   =0 店员
	create table tb_user(username varchar(15) primary key,password varchar(64),flag int not null);

	insert into tb_user values("123","123",1)
	-- 账目表 isrepay=1 已经还款  =0 没还款
 	create table tb_accounts(aid int primary key auto_increment, aitem text, aitem_money float(10,2), isrepay int, atime datetime);
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
	create table tb_sale(sid varchar(20) primary key,sale_money float(10,2),get_money float(10,2),itemnum int,username varchar(15),
		stime datetime,foreign key(username) references tb_user(username));
	create table tb_saledetails(sid varchar(20),cid int,snum int,sale_price float(8,2),foreign key(sid) references tb_sale(sid),foreign key(cid) references tb_commodity(cid));
	
	-- 

	-- 查询
	--查询商品信息
	select cname as text,tname,small_unit,cnum,ccost,csticker_price from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid;

	-- 销售表——新
	 
	
		insert into tb_sale values("sale160517215505",222,300,2,"username","2016-5-17 21:55:06")
			insert into tb_sale values("sale160617215505",222,300,2,"username","2016-6-17 21:55:06")
				insert into tb_sale values("sale160717215505",222,300,2,"username","2016-7-17 21:55:06")

	insert into tb_saledetails values("sale160217215505",4,1,1000);
		insert into tb_saledetails values("sale160317215505",3,3,1000);
			insert into tb_saledetails values("sale160417215505",3,3,1000);
				insert into tb_saledetails values("sale160617215505",3,3,1000);
					insert into tb_saledetails values("sale160717215505",3,3,1000);
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



select month(stime),sum(ccost * snum) from tb_commodity,tb_sale,tb_saledetails 
where tb_commodity.cid=tb_saledetails.cid  
and tb_saledetails.sid=tb_sale.sid and year(stime)='2016'  group by month(stime)


select  tb_type.tid,sum(snum*sale_price)/(select sum(sale_money) from tb_sale) 
from tb_saledetails,tb_commodity,tb_type,tb_sale
where tb_saledetails.cid=tb_commodity.cid and tb_commodity.tid=tb_type.tid 
and tb_saledetails.sid=tb_sale.sid
group by tb_type.tid


select sale_money from tb_sale


