Para rodar o projeto é necessário ter o docker, entrar na pasta laradock e seguir os passos a seguir:    

Gerar as imagens que serão usadas  
docker-compose up build nginx mysql phpmyadmin redis workspace    

ativar serviços:  
docker-compose up -d nginx mysql phpmyadmin redis workspace    

entrar no serviço de banco de dados:  
docker exec -it laradock_mysql_1 sh    

acessar banco:  
mysql -u root -p  
senha de acesso:  
root    

comando para criar banco:  
CREATE DATABASE IF NOT EXISTS `default` COLLATE 'utf8_general_ci' ;  
GRANT ALL ON `default`.* TO 'root'@'%' ;  
FLUSH PRIVILEGES ;    

ctrl+d duas vezes para sair do serviço    

acessar workspace:  
docker exec -it laradock_workspace_1 sh    

instalar bibliotecas:  
composer update  

gerar tabelas no banco:
php artisan migrate