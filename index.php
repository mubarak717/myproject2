<?php 
include './inc/db.php';
include './inc/from.php';

$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>



<div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <img src="images/tvtc.png" alt="">
      <h1 class="display-4 fw-normal">اربح مع مبارك</h1>
      <p class="lead fw-normal">باقي على فتح التسجيل</p>
      <h3 id="dad"></h3>
      <p class="lead fw-normal">للسحب على ربح نسخه مجانيه</p>
    </div>

<h3>للدخول الى السحب الرجاء اتباع ما يلي:</h3>
    <ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشر على صفحتي على فيس بوك بالتاريخ المذكور</li>
  <li class="list-group-item">ساقوم ببث مباشر لمده ساعتين عباره عن اسئله واجوبه حره للجميع</li>
  <li class="list-group-item">خلال فتره الساعتين سيتم فتح صفحه التسجيل هنا حيث ستقوم بتسجيل اسمك وايميلك</li>
  <li class="list-group-item">بنهايه البث سيتم اختيار واحد من قاعده البيانات بشكل عشوائي</li>
  <li class="list-group-item">الرابح سيحصل على نسخه مجانيه من البرنامج</li>
</ul>

<div class="container">

<div class="position-relative text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">

<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" >
  <h3>الرجاء ادخال معلوماتك</h3>
  <div class="mb-3">
    <label for="firstName" class="form-label">الاسم الاول</label>
    <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstname ?>">
    <div class="form-text error"><?php echo $errors['firstNameerror'] ?></div>
  </div>

  <div class="mb-3">
    <label for="lastName" class="form-label">الاسم الاخير</label>
    <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastname ?>">
    <div class="form-text error"><?php echo $errors['lastNameerror'] ?></div>
  </div>

  <div class="mb-3">
    <label for="Email" class="form-label">البريد الالكتروني</label>
    <input type="text" name="Email" class="form-control" id="Email" value="<?php echo $email ?>">
    <div class="form-text error"><?php echo $errors['emailerror'] ?></div>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">ارسال المعلومات</button>
</form>
    </div>
    </div>



</div>

<div class="loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-7 mx-auto my-5">

<button type="button" id="winner" class="btn btn-primary">
  اختيار الرابح
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user):?>
        <h1 class="display-6 text-center modal-title" id="modalLabel"> <?php echo htmlspecialchars($user['firstName'])
        .' '.htmlspecialchars($user['lastName'])?> </h1>
        <?php endforeach; ?>
      </div>
     
    </div>
  </div>
</div>



 <script src="./js/bootstrap.bundle.min.js"></script>

<script src="./js/script.js"></script>
</body>
</html>