<?php
interface IConnection {

private PDO $connection;
public function getPDO() :PDO;

public function getEmail() :Email;

}