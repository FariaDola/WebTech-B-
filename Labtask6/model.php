<?php 
require_once 'dbConnection.php';

function insertdata($data)
{
	$conn = db_conn();
	$selectQuery = "INSERT INTO `usertable` (`firstname`, `lastname`, `username`, `password`, `type`, `email`, `image`) VALUES (:firstname, :lastname, :username , :password, :type , :email , :image);";
	try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':firstname' => $data['firstname'],
        	':lastname' => $data['lastname'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	':type' => $data['type'],
        	':email' => $data['email'],
        	':image'=> $data['image']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function fetchusername($username)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `usertable` where username = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    if(!$row)
        {$data['id']='0'; return $data;}
    else
        {return $row;}
}
function fetchid($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `usertable` where id = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    if(!$row)
        {$data['id']='0'; return $data;}
    else
        {return $row;}
}
function updatewithimage($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `usertable` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `email` = :email, `image` = :image WHERE (`id` = :id)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':image'=> $data['image']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function update($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `usertable` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `email` = :email WHERE (`id` = :id)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function updatepassword($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `usertable` SET `password`=:password WHERE (`id`=:id);";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':password' => $data['password'],
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

?>