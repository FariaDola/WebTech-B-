<?php 

require_once 'dbConnection.php';

function insertdata($data)
{
	$conn = db_conn();
	$selectQuery = "INSERT INTO `labtask8`.`usertable` (`firstname`, `lastname`, `username`, `password`, `type`, `email`, `image`) VALUES (:firstname,:lastname,:username,:password,:type,:email,:image);";
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
function fetchuser($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `labtask8`.`usertable` where id = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row)
        {$data['id']='0'; return $data;}
    else
        {return $row;}
}
function fetchuserbyusername($username)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `labtask8`.`usertable` where username = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row)
        {$data['id']='0'; return $data;}
    else
        {return $row;}
}
function alterdatawithimage($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `labtask8`.`usertable` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `email` = :email, `image` = :image WHERE (`id` = :id)";
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
function alterdata($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `labtask8`.`usertable` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `email` = :email WHERE (`id` = :id)";
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
    $selectQuery = "UPDATE `labtask8`.`usertable` SET `password`=:password WHERE (`id`=:id);
";
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