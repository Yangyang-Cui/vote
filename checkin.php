<?php 
require_once('./includes/header.php'); 

if(isset($_POST['submit'])){
    $email = $_POST['uemail'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    // Add users to our database
    try {
        // create SQL insert statement
        $sqlInsert = "INSERT INTO users(email, firstname, lastname)
                VALUES (:email, :firstname, :lastname)";

        // use PDO prepared to sanitize data
        $statement = $db->prepare($sqlInsert);

        // add the data into the database
        $statement->execute(array(
            ':email' => $email,
            ':firstname' => $firstname,
            ':lastname' => $lastname
        ));
        // check if one new row was created
        if ($statement->rowCount() == 1) {
            echo "Registration Successful";
        }
    } catch (PDOException $ex) {
        echo "An error occurred: ". $ex->getMessage();
    }


}
?>

<h1>Dummy checkin</h1>
<form method="POST" action="">
    First name
    <input type="text" name="fname" /><br /> Last name
    <input type="text" name="lname" /><br /> Email
    <input type="text" name="uemail" /><br />
    <button type="submit" name="submit">Submit</button>
</form>

<?php require_once('./includes/footer.php'); ?>
