<?php
require_once '../vendor/autoload.php';
require_once '../configs/app.php';

try {
    // Create the SMTP Transport
    $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465, 'ssl'))
        ->setUsername('message-app.info')
        ->setPassword('yxtvcctenozxydoo');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = new Swift_Message();

    // Set a “subject”
    $message->setSubject('Поступило новое сообщение из формы обратной связи.');

    // Set the “From address”
    $message->setFrom(['message-app.info@yandex.ru' => 'MessageApp Info']);

    // Set the “To address” [Use setTo method for multiple recipients, argument should be array]
    $message->addTo($adminEmail, 'recipient name');

    // Set the plain-text “Body”
    $message->setBody('Cообщение от пользователя ' . $messageEmail['users_first_name'] . ' ' . $messageEmail['users_last_name']);

    // Set a “Body”
    $message->addPart("Поступило сообщение от пользователя - " . $messageEmail['users_first_name'] . " " . $messageEmail['users_last_name'] .
        "\n\nТема сообщения: " . $messageEmail['subjects_subject'] .
        "\n\nТекст сообщения: " . $messageEmail['messages_message'] .
        "\n\nВы можете ответить пользователю на почту " . $messageEmail['users_email']
    );

    // Send the message
    $result = $mailer->send($message);
    var_dump($result);
} catch (Exception $e) {
    echo $e->getMessage();
}
