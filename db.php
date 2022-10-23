<?php
$connect = new PDO(
    'mysql:host=127.0.0.1;dbname=duanmau',
    'root',
    ''
);

function pdo_execute($sql)
{
    $connect = new PDO(
        'mysql:host=127.0.0.1;dbname=duanmau',
        'root',
        ''
    );
    try {
        $statement = $connect->prepare($sql);
        $statement->execute();
    } catch (PDOException $e) {
        throw $e;
    }
}
function pdo_execute_return_lastinsertid($sql)
{
    $connect = new PDO(
        'mysql:host=127.0.0.1;dbname=duanmau',
        'root',
        ''
    );
    try {
        $statement = $connect->prepare($sql);
        $statement->execute();
        return $connect -> lastInsertId(); 
    } catch (PDOException $e) {
        throw $e;
    }
}
function pdo_query($sql)
{
    $connect = new PDO(
        'mysql:host=127.0.0.1;dbname=duanmau',
        'root',
        ''
    );
    try {
        $statement = $connect->prepare($sql);
        $statement->execute();
        $rows = $statement -> fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
function pdo_query_one($sql)
{
    $connect = new PDO(
        'mysql:host=127.0.0.1;dbname=duanmau',
        'root',
        ''
    );
    try {
        $statement = $connect->prepare($sql);
        $statement->execute();
        $row = $statement -> fetch();
        return $row;
    } catch (PDOException $e) {
        throw $e;
    }

}

