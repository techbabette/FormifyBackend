<?php

namespace App\Services;

use App\DataTransferObjects\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MQService
{
    private $MQ_HOST;
    private $exchange_name = 'main_exchange';
    
    public function __construct(){
        $this->MQ_HOST = config("mq.MQ_HOST");

    }

    public function publishToExchange($message, string $event_name) : void
    {
        var_dump($this->MQ_HOST);
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