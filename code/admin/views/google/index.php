<?php
/**
 * @var app\system\google\GoogleAPI $client
 */
$service = new Google_Service_Gmail($client->getClient());

$mailer = $service->users_messages;

$message = (new \Swift_Message('Here is my subject'))
    ->setFrom('myemailaddress@myserver.com')
    ->setTo(['roberts.mark1985@gmail.com' => 'Test Name'])
    ->setContentType('text/html')
    ->setCharset('utf-8')
    ->setBody(file_get_contents(__DIR__ . '/html.php'));


$encoded_message = rtrim(strtr(base64_encode($message->toString()), '+/', '-_'), '=');


$message = new \Google_Service_Gmail_Message();
$message->setRaw($encoded_message);
$message = $mailer->send('me', $message);
print_r($message);



//foreach ($service->users_messages->listUsersMessages('me')->getMessages() as $message) {
//    echo '<pre>';
//    print_r(base64_decode($service->users_messages->get('me', $message->getId())->getPayload()->getBody()->data));
//    foreach ($service->users_messages->get('me', $message->getId())->getPayload()->getParts() as $part) {
//        print_r(gmailBodyDecode($part->getBody()->getData()));
//    }
//    echo '</pre>';
//}




function gmailBodyDecode($data) {
    $data = base64_decode(rtrim(strtr($data, '+/', '-_'), '='));
    return $data;
}

function gmailBodyEncode($data) {
    $data = base64_decode(str_replace(array('-', '_'), array('+', '/'), $data));
    return $data;
}
