<?php

$message = 'myMessage';

//fanout
$exName = 'exFanOut';
$qName = 'qF';
//Yii::app()->amqp->exchangeDelete($exName);
Yii::app()->amqp->declareExchange($exName, $type = 'fanout', $passive = false, $durable = true, $auto_delete = false);
Yii::app()->amqp->declareQueue($qName, $passive = false, $durable = true, $exclusive = false, $auto_delete = false);
Yii::app()->amqp->bindQueueExchanger($qName, $exName);
Yii::app()->amqp->publish($message, $exName, $routeKey = '', $content_type = 'text/plain', $expiration = '', $message_id = '', $app_id = yii::app()->name);
Yii::app()->amqp->closeConnection();

