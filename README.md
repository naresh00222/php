<<<<<<< HEAD
# Introduction to Composer

- Open your existing codespace (you shouldn't create a new one) [https://github.com/codespaces](https://github.com/codespaces).
- In the terminal enter

```
git clone https://github.com/CHT2520-web-prog/intro-to-composer
```

- This will copy the contents of this repository into your codespace.

- In the terminal navigate to the _intro-to-composer_ directory

```
cd intro-to-composer
```

- Start a web server

```
php -S 0.0.0.0:8000
```
- View the page in a browser. 

This is simple app where users can select a colour and we show a swatch of their chosen colour. 

There will be an error message in the page. We will fix this shortly. 

We want the app to show different shades of the chosen colour, a lighter shade, a darker shade, and a complementary colour (a colour that is the opposite on a colour wheel).

To get the different shades of the chosen colour we can use the [phpcolors library](https://packagist.org/packages/mexitek/phpcolors)


To install the `phpcolors` library enter the following into the terminal (you may need to stop the server first `Ctrl+c`):

```
composer require mexitek/phpcolors
```

Composer should generate a _package.json_ file and download the library into the _vendor_ folder. 

- In _index.php_, change the code at the top of the page to the following:

```php
require __DIR__ . '/vendor/autoload.php';

use Mexitek\PHPColors\Color;

// Reads the colour value from the submitted form
$baseHex = $_POST['base'] ?? '#3498db';

//This code uses the PHPColors library
$color = new Color($baseHex);
$lighter = $color->lighten(20);
```

This code requires the autoload file and imports the `Color` class from the `phpcolor` library. 

After we have read the selected colour from the form, we can use the library to create a new colour object and then create a lighter version of it. 

- Save your changes and test the page. 

The user should now see two swatches, their chosen colour and a lighter variant. 

Have a good look in the PHP and HTML code to make sure you understand how this is working.

## Test Your Understanding

- Add another swatch to the page to show a darker variant of the colour. 

- Have a look at the [phpcolors library documentation](https://packagist.org/packages/mexitek/phpcolors) to find out how to darken a colour.

- If you can get this to work, add a fourth swatch for a complementary colour. 

- There is a second form control for selecting the amount to lighten/darken by. How can you read the value from this form control and use this when lightening/darkening a colour. 

- Finally, once we have four different swatches, we have lots of duplicate HTML code. How can you use arrays to store the different colour variants and a loop in the HTML page to dynamically generate the swatches.

## Using Composer in our MVC App

- One simple change we could make in our MVC app is moving _configuration out of code_.
- Currently we store configuration information in a PHP array:

```php
$config = [
    'database'=>[
        'host' => 'db',
        'dbname' => 'webdev',
        'username' => 'student',
        'password' => 'secret',
    ]
];
return $config;
```

- It would be nice if the configuration was in a plain text file (**.env** file is a convention) e.g.

**.env**

```
DB_HOST=localhost
DB_NAME=webdev
DB_USER=student
DB_PASS=secret
```
- Makes it easy to exclude from version control
- Don't have to edit PHP code to switch to a different database

- Have a go at using the `vlucas/phpdotenv` library. This library allows us to load and parse an _.env_ file easily.
  
```
composer require vlucas/phpdotenv
```

To use the library, we might have some PHP code like the following:

```php
// Require the autoload file
require_once __DIR__ . '/../vendor/autoload.php';

// Use the Dotenv library to load the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


use App\Models\FilmRepository;
use App\Database;
use App\Controllers\FilmController;

// Use the .env file settings for the databse
$database = new Database(
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    );
$conn = $database->getConnection();
```

=======
# php
>>>>>>> afd457bc96b969b2edef778830d2078a650612de
