# GUD-FRAMEWORK-PHP

- Installation

1. Download

git clone ``https://github.com/BayuRifkiAlghifari/GUD-FRAMEWORK-PHP.git`` or Download on this repository

2. Base URL Configuration

Open ``config.php`` in app/config/config.php then change according to the name of your project name

```php
<?php
	const base_url 	= 'http://localhost/Your Folder Name/';
?>
```
  
3. Database Configuration

Open database.php in app/config/database.php then change according to your database configuration

```php
<?php
	const db_name = 'YOUR DATABASE NAME';
	const db_host = 'localhost';
	const db_user = 'root';
	const db_pass = 'YOUR DATABASE PASSWORD';
?>
```

4. Composer

```bash
	composer dump-autoload
	composer install
```


5. Finish

Ready to use

- Features

1. Routing
2. Email
3. File upload
4. ORM Model
5. Query Builder
6. PSR 4 Autoloadings