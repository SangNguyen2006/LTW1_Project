<?php
class Db
{
	//Tao bien $conn ket noi
	public static $conn;
	//Tao ket noi trong ham construct
	public function __construct()
	{
		self::$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		self::$conn->set_charset('utf8');
	}
	public function __destruct(){
		self::$conn->close();
	}
	//Ham tra ve kieu mang tu mot object
	public function getData($obj){
		$arr = array();
		while($row = $obj->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}
	//Lay ra tat ca san pham trong bang products
	public function getAllProducts(){
		//viet cau sql
		$sql ="SELECT * FROM products";
		//thuc thi cau truy van
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
//Lay ra tat ca san pham trong bang protypes
	public function getAllProtypes(){
		//viet cau sql
		$sql ="SELECT * FROM protypes";
		//thuc thi cau truy van
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
//Lay ra tat ca san pham trong bang menufactures
	public function getAllManufactures(){
		//viet cau sql
		$sql ="SELECT * FROM manufactures";
		//thuc thi cau truy van
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//Viết câu truy vấn lấy ra tên và giá sản phẩm có giá từ 1 triệu trở lên
	public function product1(){
		$sql="SELECT `name`,`price` FROM `products` WHERE `price`>=1000000";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//Viết câu truy vấn lấy ra tên và giá sản phẩm có giá từ 1 đến 5 triệu
	public function product2(){
		$sql="SELECT 'name', 'price' FROM products WHERE 'price' >= 1000000 AND 'price' <= 5000000";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//4.	Viết câu truy vấn lấy ra tên và giá sản phẩm mà nội dung phần mô tả có chứa chữ “smart”

	public function product3(){
		$sql="SELECT 'name', 'desc' FROM products WHERE LIKE description = “%smart%”";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//5.	Viết câu truy vấn lấy ra tên và giá sản phẩm có ID = 10
	public function product4(){
		$sql="SELECT `name`,`price`,`ID` FROM `products`,`manufactures` WHERE  ID = 10";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//9.	Viết câu truy vấn lấy ra các thông tin của sản phẩm của hang “Apple” và “Samsung”
	public function product5(){
		$obj = self::$conn->query("SELECT `name`,`price`, `description` FROM `products`,`manufactures` WHERE products.manu_ID = manufactures.manu_ID AND manufactures.manu_name = 'Apple' AND manufactures.manu_name = 'Samsung'");
		return $this->getData($obj);
	}
	//6.	Viết câu truy vấn lấy ra tên và giá của 10 sản phẩm mới nhất
	public function product6(){
		$sql="SELECT 'name', 'desc' FROM products WHERE LIKE description = “%smart%”";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//7.	Viết câu truy vấn lấy ra tất cả thông tin của 10 sản phẩm tiếp theo (sau 10 sản phẩm nhất)
	public function product7(){
		$sql="SELECT 'name', 'price' FROM products ORDER BY `ID` DESC LIMIT 0,10";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//8.	Viết câu truy vấn lấy ra tất cả thông tin của sản phẩm, sắp theo thứ tự giảm dần của ID
	public function product8(){
		$sql="SELECT `name`,`price`,`type_ID`  FROM `products`,`manufactures` WHERE   products.manu_ID = manufactures.manu_ID AND ORDER BY products.ID DESC";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//10.	Viết câu truy vấn lấy tên sản phẩm và tên hãng của các sản phẩm là loại “laptop”
	public function product9(){
		$sql="SELECT `name`,`manu_name` FROM `products`,`protypes`,`manufactures` WHERE products.type_ID = protypes.type_ID AND manufactures.manu_ID = products.manu_ID AND type_name = 'laptop'";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	//1.	Viết câu truy vấn lấy ra tên và giá sản phẩm của hãng “Apple”
	public function product10(){
		$sql="SELECT `name`,`price` FROM `products`,`manufactures` WHERE products.manu_ID = manufactures.manu_ID AND manufactures.manu_name = 'Apple'";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
	public function product11(){
		$sql = "SELECT `ID`, `image`,`name`, `type_name` ,`manu_name`,`description`,`price` FROM `products`, `manufactures`, `protypes` WHERE products.type_ID = protypes.type_ID AND products.manu_ID = manufactures.manu_ID";
		$obj = self::$conn->query($sql);
		return $this->getData($obj);
	}
}