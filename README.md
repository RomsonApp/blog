#installation
1. git clone https://github.com/RomsonApp/blog.git
2. composer dump-autoload
3. Create database and import blog-test.sql
4. Configure main.php in application/config

Database connection:

'database' => array(
        'host' => '',
        'dbname' => '',
        'user' => '',
        'password' => ''
    ),

Default folder for uploads:
'uploadPath' => ROOT_DIR . "uploads",

5. chmod 777 for uploads folder

That's all. You are welcome :)