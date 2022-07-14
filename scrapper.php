<?php
require 'vendor/autoload.php';
include 'mail.php';
include 'db.php';
$httpClient = new \GuzzleHttp\Client();

$response = $httpClient->get('https://www.hansainvest.com/deutsch/fondswelt/fondsdetails.html?fondsid=780');

$htmlString = (string) $response->getBody();

libxml_use_internal_errors(true);

$doc = new DOMDocument();
@$doc->loadHTML($htmlString);

$xpath = new DOMXPath($doc);

$dates= array();
$urls = array();

//First Link

$date_1 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][2]/div[@class='link-wrapper']/span");
$date1 = (string) $date_1->item(0)->textContent;

$url_1 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][2]/div[@class='link-wrapper']/a[@class='button button--square']");
$url1 = (string) $url_1->item(0)->getAttribute('href');

$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date1,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url1);
//Second Link
$date_1 = $xpath->query("//div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][3]/div[@class='link-wrapper']/span");
$date1 = (string) $date_1->item(0)->textContent;

$url_2 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][3]/div[@class='link-wrapper']/a[@class='button button--square']");
$url2 = (string) $url_2->item(0)->getAttribute('href');


$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date1,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url2);


//Third Link

$date_3 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][1]/div[@class='link-wrapper']/span");
$date3 = (string) $date_3->item(0)->textContent;

$url_3 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][1]/div[@class='link-wrapper']/a[@class='button button--square']");
$url3 = (string) $url_3->item(0)->getAttribute('href');

$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date3,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url3);


//Fourth Link

$date_4 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][4]/div[@class='link-wrapper']/span");
$date4 = (string) $date_4->item(0)->textContent;

$url_4 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][4]/div[@class='link-wrapper']/a[@class='button button--square']");
$url4 = (string) $url_4->item(0)->getAttribute('href');

$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date4,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url4);

//Fifth Link

$date_5 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][5]/div[@class='link-wrapper']/span");
$date5 = (string) $date_5->item(0)->textContent;

$url_5 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][5]/div[@class='link-wrapper']/a[@class='button button--square']");
$url5 = (string) $url_5->item(0)->getAttribute('href');

$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date5,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url5);

//Sixth Link

$date_6 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][6]/div[@class='link-wrapper']/span");
$date6 = (string) $date_6->item(0)->textContent;

$url_6 = $xpath->query("//div[@class='page']/main[@class='main']/div[@class='wrapper']/div[@class='grid grid-1 grid--lg-2']/div[@class='grid__col'][2]/div[@class='table__wrapper']/dl[@class='datalist--table']/dd[@class='datalist__info'][6]/div[@class='link-wrapper']/a[@class='button button--square']");
$url6 = (string) $url_6->item(0)->getAttribute('href');

$date = preg_match_all('/\d{2}\.\d{2}\.\d{4}/',$date6,$result);
array_push($dates,$result[0][0]);
array_push($urls,$url6);


for($i=0; $i<count($dates); $i++){
    $query = $connection->query("SELECT date FROM RESULTS".($i+1)." ORDER BY ID DESC LIMIT 1");
    $row = mysqli_fetch_array($query);
    if($row['date']==$dates[$i]) {
        echo 'Already there';
    }
    else {
        $sql_command = "INSERT INTO RESULTS".($i+1)."(id, date, url) 
        VALUES(NULL, '$dates[$i]', '$urls[$i]')";
        if (mysqli_query($connection, $sql_command)) {
            echo 'done';
            $mail->isHTML(true);
            $mail->Subject = 'New PDF on Hansa Invest';
            $mail->Body    = '<html lang="en">Hi, <br>There is new link on <a href="https://www.hansainvest.com/deutsch/fondswelt/fondsdetails.html?fondsid=780">Hansainvest.com</a><br>
            PDF LINK <br>
            <a href="'.$urls[$i].'">'.$urls[$i].'</a></html>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->Send();
        } else {
            echo mysqli_error($connection);
        }
    }
}
