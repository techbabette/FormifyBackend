<?php

namespace App\Implementation\MailerService;
use App\Interfaces\MailerService\IRegistrationEmail;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RegistrationEmailMQ implements IRegistrationEmail {
    private $MQ_HOST;
    private $exchange_name = 'main_exchange';
    
    public function __construct(){
        $this->MQ_HOST = config("mq.MQ_HOST");
    }

    public function execute(string $first_name, string $last_name, string $email, string $token) : void{
        $message = json_encode(["name" => $first_name." ".$last_name, "email" => $email, "token" => $token]);

        $this->publishToExchange($message, "mail_token");
    }

    private function publishToExchange($message, string $event_name) : void
    {
        $connection = new AMQPStreamConnection($this->MQ_HOST, 5672, 'guest', 'guest');
        $channel = $connection->channel();
        
        $channel->exchange_declare($this->exchange_name, "direct", false, true, false);
        
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, $this->exchange_name, $event_name);
        
        $channel->close();
        $connection->close();
    }
}

?>