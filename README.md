Install: 
==============================
Via composer:
```
composer require asil/otus-home-task-1.1
```

Usage example:
```php
<?php 
use Asil\Otus\HomeTask_1_1\SimpleBracketsProcessor;
  
$line = '(())';
$processor = new SimpleBracketsProcessor();
$processor->isValidBracketLine($line);
```
