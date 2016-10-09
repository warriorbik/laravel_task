## Framework Used

Laravel 5.X has been used for the solution.

## Form Detail

1. A simple form with provided fields has been created. 
2. For the education background field, multiple inputs (education level and education passed year) which can be added or removed as client may have multiple education background.
3. For the nationality field, the options are populated via model

## CSV handler

For handling csv file a CsvHelper class is used located at app/http/functions/helpers.php. It helps to read and write from the csv file. 


## Client Listing

For the client listing [Data Tables](http://datatables.net) ,a table plugin for jquery is used.Using that plugin sortable columns, keyword search, pagination features is implemented.

## Logging
Logging is also saved on cloud logging service(logentries.com). For this logentries/logentries-monolog-handler package of version 2.1 is used.

## Automated Tests

Automated test is done using PHPUnit. The test file is located on tests/ClientTest.php.
The test file simply adds a client with defined values on the csv.

## Validation

1. Client side validation: For this Jquery validation plugin has been used. The validation rules are set on the file public/assets/script/clientform-validation.js
2. Server side validation: For this it uses FormRequest. The rules are set on the file ClientFormReuest

## Note
1. Please Run composer update on the terminal form your root diretorty 
2. Please import the task.sql from the root directory.


