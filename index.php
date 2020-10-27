<?php
require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('Google Sheets and PHP');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$spreadsheetId = "1hQp0nrx5XrZUkRziNzfKR5bg0j4bp2Ltm_C5q_yJ5Ao"; //It is present in your URL
$get_range = 'A:I';
function getData($service,$range,$sheetId){
    
    $response = $service->spreadsheets_values->get($sheetId, $range);
    //getting values
    $values = $response->getValues();
    return $values;
}

function UpdateData($service,$range,$sheetId,$val){
    $body = new Google_Service_Sheets_ValueRange([

        'values' => $val
    
      ]);
    
      $params = [
    
        'valueInputOption' => 'RAW'
    
      ];
      $update_sheet = $service->spreadsheets_values->update($sheetId, $range, $body, $params);
      return($update_sheet);
    
}

//updateing values
$update_range = 'A4:I'; 

$values = [[
     "Gautam Palta",
     "vfr4667890nfg",
     "3",
     "2020-10-12",
     "3",
     "2020-10-12",
     "4",
     "2020-10-12"
],
["Gautam Palta",
     "vfr4667890nfg",
     "3",
     "2020-10-12",
     "3",
     "2020-10-12",
     "4",
     "2020-10-12"
]
];


print_r(getData($service,$get_range,$spreadsheetId));
print_r(UpdateData($service,$get_range,$spreadsheetId,$values));

// print_r($response);

?>


