<?php
require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$error = array();
$curl = curl_init();
$start = "https://";
$shop_domain = "pawdega.myshopify.com";
$endpoint = "/admin/api/2021-04/orders.json?limit=250&status=any";
$method = "GET";
$content_type = "Content-Type: application/json";
$access_token = "X-Shopify-Access-Token: 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";

class shopifyClienthelper
{

    function __construct($start, $shop_domain, $endpoint)
    {
        $this->url = $start . $shop_domain . $endpoint;
    }
    function get_url()
    {
        return $this->url;
    }
    function createPawdegaCsv($order)
    {
        $i = 0;
        $current_date = date('Y-m-d');
        $file_path = 'file_' . $current_date . '_pawdega.xlsx';
        $fp = fopen($file_path, 'wb');
        $yesterday_date = date('Y-m-d', strtotime("-1 days"));
        $final_array = [];
        $final_array_unique = [];

        foreach ($order as $key => $value) {

            //print_r($value->note_attributes['0']->name);die;
            if (isset($value->created_at)) {
                $date = explode("T", $value->created_at);
                $time = explode("+", $date[1]);
                $hour = explode(":", $time[0]);
            }
            if ($current_date === $date[0] && $hour[0] <= 16 || $yesterday_date === $date[0] && $hour[0] >= 16) {
                $line_skus = [];
                $line_qty = [];

                if (isset($value->line_items)) {
                    $line_items = $value->line_items;
                }
                if (isset($value->note_attributes)) {
                    $details = $value->note_attributes;
                }
                if (isset($line_items)) {
                    foreach ($line_items as $line_key => $line_value) {
                        array_push($line_skus, $line_value->sku);
                        array_push($line_qty, $line_value->quantity);
                    }
                }

                if (isset($value->note_attributes) && !empty($value->note_attributes)) {
                    foreach ($value->note_attributes as $key => $val) {
                        if ($val->name == 'city') {
                            $delivery_city = $val->value;
                        }
                        if ($val->name == 'date') {
                            $delivery_date = $val->value;
                        }
                        if ($val->name == 'slot') {
                            $delivery_time = explode("-", $val->value);
                        }
                    }
                } else {
                    $delivery_date = "NA";
                    $delivery_time[0] = "NA";
                    $delivery_time[1] = "NA";
                }
                if (isset($value->note)) {
                    $note = $value->note;
                }
                for ($j = 0; $j < sizeof($line_skus); $j++) {
                    if ($value->payment_gateway_names[0] != 'manual') {
                        if ($j == 0) {
                            $this->data = array(
                                'order_id' => $value->id,
                                'depositor_code' => "WH055",
                                'order_code' => $value->name,
                                'customer_code' => $value->customer->id,
                                'deliveryType' => '01-B2C',
                                'item_code' => $line_skus[$j],
                                'unit' => 'PC',
                                'quantity' => $line_qty[$j],
                                'customer_name' => $value->customer->default_address->name,
                                'address' => $value->customer->default_address->address1,
                                'area' => $value->customer->default_address->city,
                                'city' => $value->customer->default_address->province,
                                'delivery_date' => $delivery_date,
                                'delivery_time_from' => $delivery_time[0],
                                'delivery_time_to' => $delivery_time[1],
                                'notes' => $note,
                                'payment_type' => $value->payment_gateway_names[0],
                                'total_amount' => $value->current_total_price
                            );
                        } else {
                            $this->data = array(
                                'order_id' => $value->id,
                                'depositor_code' => 'WH055',
                                'order_code' => $value->name,
                                'customer_code' => $value->customer->id,
                                'deliveryType' => '01-B2C',
                                'item_code' => $line_skus[$j],
                                'unit' => 'PC',
                                'quantity' => $line_qty[$j],
                                'customer_name' => $value->customer->default_address->name,
                                'address' => $value->customer->default_address->address1,
                                'area' => $value->customer->default_address->city,
                                'city' => $value->customer->default_address->province,
                                'delivery_date' => $delivery_date,
                                'delivery_time_from' => $delivery_time[0],
                                'delivery_time_to' => $delivery_time[1],
                                'notes' => $note,
                                'payment_type' => $value->payment_gateway_names[0],
                                'total_amount' => $value->current_total_price
                            );
                        }
                    }
                    if (isset($this->data)) {
                        array_push($final_array, $this->data);
                    }
                }
                $final_array_unique = $final_array;
            }
            $i++;
        }
        $final_array_unique = get_combine_array($final_array);
        fputcsv($fp, array_keys($final_array[0])); // First write the headers
        if (isset($final_array_unique)) {
            foreach ($final_array_unique as $array) {
                if ($array['delivery_date'] !== "NA" || $array['delivery_time_from'] !== "NA" ||  $array['delivery_time_to'] !== "NA") {
                    fputcsv($fp, $array);   // Then write the fields
                }
            }
        }
        fclose($fp);
    }
}

$prepareUrl = new shopifyClienthelper($start, $shop_domain, $endpoint);
$mainUrl = $prepareUrl->get_url();

curl_setopt_array($curl, array(
    CURLOPT_URL => $mainUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $method,
    CURLOPT_HTTPHEADER => array(
        $content_type, $access_token
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$res = json_decode($response);
$order = $res->orders;
$prepareUrl->createPawdegaCsv($order);
sendCustomerEmail();



function sendCustomerEmail()
{
    $current_date = date('Y-m-d');
    $yesterday_date = date('Y-m-d', strtotime("-1 days"));
    $file_path = 'file_' . $current_date . '_pawdega' . '.xlsx';

    $mail = new PHPMailer();
    //$mail->From = "apps@cedcommerce.com";
    $mail->setfrom('noreply@cedcommerce.com');
    $mail->FromName = "Pawdega";
//$mail->addaddress("shubhamsharma@cedcommerce.com");
    $mail->addaddress("warehousing.dxb@transcorp-intl.com");
    $mail->addcc("bark@pawdega.com");
    $mail->addbcc("shubhamsharma@cedcommerce.com");
    $mail->isHTML(true);

    $mail->Subject = "Order CSV - Pawdega";
    $mail->Body = '<div>
        <p>Hi There</p></br>
        <p>Hope you find this mail well & safe. Attached is the CSV of the orders for today. Kindly look into the Order Fulfilment Process.</p></br>
        <p>Thanks & Regards</p></br>
        <p>Pawdega</p>
    </div>';

    $mail->addAttachment($file_path);

    try {
        $mail->send();
        echo "mail send on the customer email address";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


function get_unique_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

function get_combine_array($array)
{
    $key = "item_code";
    $key2 = "customer_code";
    $temp_array = array();
    $i = 0;
    $key_array = array();
    $pairarrMain = [];
    foreach ($array as $val) {
        $pairarr = array("order_code" => $val['order_code'], "item_code" => $val['item_code'], "customer_code" => $val['customer_code']);
        if (!in_array($pairarr, $pairarrMain)) {
            $pairarrMain[$i] = $pairarr;
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

