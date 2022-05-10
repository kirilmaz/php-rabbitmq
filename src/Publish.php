<?php
declare(strict_types=1);

namespace Kirilmaz\RabbitMQ;

use Kirilmaz\RabbitMQ\Actions\RabbitMQPublishAction;

class Publish {
    public static function handle($queue, $message) {
        $rabbitMQPublishAction = new RabbitMQPublishAction();
        $rabbitMQPublishAction->handle($queue, $message);
    }
}