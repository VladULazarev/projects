How to run the test:

1. Unzip the file unit-testing.zip

2. Find out where your PHP is living. For example, my is here:
   c:/OpenServer/modules/php/PHP_8.0/php.exe

3. Open the file: /unit-testing/vendor/bin/phpunit, and set the first line as:
   #!/usr/bin/env c:/OpenServer/modules/php/PHP_8.0/php.exe

4. Open your terminal (Git Bash) and make sure you are in: /unit-testing

5. Run the command: ./vendor/bin/phpunit tests
