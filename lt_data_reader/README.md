## Description

This package provides functionalities for reading table data which is represented linearly.

For example, the following linear data presentation could be read and parsed by the lb_data_reader.php;

```
getParsedData ( string $string ) : array
```

Returns an array 

#### Parameters

The string parameter's data words must have only one space between them.


#### Return Values

The function getParsedData returns an array whose first index is an array of the column names. 
The rest of the indexes represents an array of table rows (values). 


#### Examples

```
$test_data = "USER EMAIL NumberOfDevices testName testName@email.com 102 testName2 testName2@email.com 109";
$result_output = getParsedData($test_data, 3);
``` 
The **result_output** will print *[[USER, EMAIL, NumberOfDevices], [testName, testName@email.com, 102], [testName2, testName2@email.com, 109]]*

