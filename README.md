Standalone Active Record
========================
Based on the [CodeIgnitor](https://github.com/bcit-ci/CodeIgniter) database implementation
This takes the ActiveRecord and Database Library from 3.0 and makes it work without the rest of CodeIgniter.

Setup
------------------------
composer.phar require sujayjaju/php-active-record

Usage
------------------------
```php
// Include
use ActiveRecord\ActiveDatabase;

...

// Create Database configs
$db_config = array(
    'hostname' => "localhost",
    'username' => "username",
    'password' => "password",
    'database' => "database_name",
    'dbdriver' => "mysql",
    'pconnect' => FALSE,
    'db_debug' => TRUE
);

// Add Config and give it a name
ActiveDatabase::addConfig("read", $db_config);

//Use the named connection
$query = ActiveDatabase::get("read")->get('table_name')
$row = $query->result_array();
print_r($row);
```

Documentation
------------------------

For more on how to use active records: Refer CodeIgnitor's reference documentation at:

[Database Reference](http://www.codeigniter.com/userguide3/database/index.html)

```php
$this->db
```
gets replaced by
```php
ActiveDatabase::get("db_reference_name")
```

Contributions
------------------------
Thanks to the base setup by Documentopia.com


