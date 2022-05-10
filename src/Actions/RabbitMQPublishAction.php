<?php
declare(strict_types=1);

namespace Kirilmaz\RabbitMQ\Actions;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQPublishAction {
    public function handle($queue, $message) {
        $config = conf('rabbitmq', ['host', 'port', 'username', 'password']);

        $connection = new AMQPStreamConnection(
            $config->host,
            $config->port,
            $config->username,
            $config->password
        );

        $channel = $connection->channel();

        $channel->queue_declare($queue, false, true, false, false);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, '', $queue);
    }
}