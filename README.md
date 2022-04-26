# GT2I

Create Mysql and Prestashop images on docker by commands :


  The network for the communication between  Mysql and Prestashop
		
	docker network create gt2i-net
  
  Mysql container
  
	docker run -ti --name gt2i-mysql --network gt2i-net -e MYSQL_ROOT_PASSWORD=gt2i-password -p 3307:3306 -d mysql:5.7
  
  Prestshop container
  
	docker run -ti --name gt2i-prestashop --network gt2i-net -e DB_SERVER=gt2i-mysql -p 8080:80 -d prestashop/prestashop
