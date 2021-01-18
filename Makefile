copy-to-host-vendor-dir:
	docker cp $(docker ps -aqf "name=symfony-traning_php"):/var/www/html/myapp/vendor myapp/