Here’s an example of how to log something:
```php

//Create a new object, send relative or absolute path to your log file
$log = new phpLogger("example.log");

//Add a few records to your log file
$log->write("user_1", "login successful");
$log->write("user_2", "login failed");


```


Here’s an example of how to read log:
```php

//Create a new object(if you didn't), send relative or absolute path to your log file
$log = new phpLogger("example.log");

//Read last 10 records from your log file
$arrayOfLogs = $log->read(10);


```
