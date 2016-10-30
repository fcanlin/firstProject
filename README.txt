在今天学习php与mysql时，发现html页面已经使用了<meta http-equiv="content-Type" content="text/html;charset=UTF8"> 
来设置字符编码为utf8，同时php文件也使用了header("Content-type:text/html; charset=utf-8")来设置编码为utf8，
文件保存格式也是utf8格式，但是执行了插入操作后，发现插入的数据依然是乱码。
进过度娘查询，发现是在连接数据库后，需要加上这么一句操作
mysqli_query($link, "set names utf8");