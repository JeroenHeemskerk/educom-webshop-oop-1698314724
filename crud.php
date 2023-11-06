<?php


// maak van de my_sql een PDO variant
// 

// PDO stijl (PHP Data objects)
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "myDBPDO";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//   VALUES ('John', 'Doe', 'john@example.com')";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "New record created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

// $conn = null;
// 


// class Crud
// {
//     //deze crud klasse moet generiek worden

//     public function __construct()
//     {
//         $servername = 'localhost';
//         $username = 'laura_web_shop_user';
//         $password = 'ditiseenwachtwoord';
//         $dbname = 'lauras_webshop';

//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//         // dit is volgens mij nog zonder prepared statements, moet nog komen
//         // globaal configureren om objecten terug te geven

//         $sql = "INSERT INTO users (firstname, lastname, email)
//         VALUES ('John', 'Doe', 'john@example.com')";
//         $conn->exec($sql);
//     }
// }


class Crud
{
    private $pdo;

    public function __construct()
    {
        $servername = 'localhost';
        $username = 'laura_web_shop_user';
        $password = 'ditiseenwachtwoord';
        $dbname = 'lauras_webshop';

        $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    public function createRow($sql, $params)
    {
        $stmt = $this->pdo->prepare($sql);
        $success = $stmt->execute($params);

        if ($success) {
            // Return the last inserted ID
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function readOneRow($sql, $params, $className = null)
    {
        $stmt = $this->pdo->prepare($sql);
        // foreach ($params as $key => $value) {
        //     $stmt->bindValue($key, $value);
        // }
        $stmt->execute($params);

        if ($className) {
            return $stmt->fetchObject($className);
        } else {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }

    public function readMultipleRows($sql, $params, $className = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        if ($className) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
        } else {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // public function updateRow($sql, $params) {
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute($params);
    // }

    // public function deleteRow($sql, $params) {
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt->execute($params);
    // }
}
