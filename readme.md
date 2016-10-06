## Framework Used

Laravel 5.X has been used for the solution.

# Solution

Each form submission inserts a row on the csv file with the client details.


## Form Detail

1. A simple form with provided fields has been created. 
2. For the education background field, multiple inputs (education level and education passed year) which can be added or removed as client may have multiple education background.
3. For the nationality field, the options are populated via model


## Client Listing

For the client listing [Data Tables](http://datatables.net) ,a table plugin for jquery is used.Using that plugin sortable columns, keyword search, pagination features is implemented.

## Logging
Logging is also saved on cloud logging service(logentries.com). For this logentries/logentries-monolog-handler version 2.1 is used.

## Automated Tests

Automated test is done using PHPUnit. The test file is located on tests/ClientTest.php.
The test file simply adds a client with defined values on the csv.
## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
