<?php 

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['Email'];

$errors = [
    'firstNameerror' => '',
    'lastNameerror' => '',
    'emailerror' => '',

];



if (isset($_POST['submit'])) {
    
   //تحقق الاسم الاول
if(empty($firstname)){
    $errors['firstNameerror'] = 'يرجى ادخال الاسم الاول';
}
//تحقق الاسم الاخير
elseif(empty($lastname)){
    $errors['lastNameerror'] = 'يرجى ادخال الاسم الاخير';
}
//تحقق الايميل
elseif(empty($email)){
    $errors['emailerror'] = 'يرجى ادخال الايميل';
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailerror'] = 'يرجى ادخال ايميل صحيح';

}
//تحقق لايوجد اخطاء

if(!array_filter($errors)){
$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastName'] );
$email = mysqli_real_escape_string($conn, $_POST['Email']);

$sql = "INSERT INTO users(firstName, lastName, Email)
VALUES('$firstname', '$lastname', '$email' )";


    if(mysqli_query($conn, $sql)){
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
    else {
        echo'error: ' . mysqli_eror($conn);
    }

}
}


    