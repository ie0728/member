<?php 
$ourdata=include("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $nickname=$_POST['nickname'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $cellphone=$_POST['cellphone'];

    $check="SELECT * FROM member WHERE email='$email'";
    if(mysqli_num_rows(mysqli_query($ourdata,$check))==0){
        $sql="INSERT INTO member (`email`,`password`,`nickname`,`birthday`,`gender`,`address`,`cellphone`)
            VALUES('$email','$password','$nickname','$birthday','$gender','$address','$cellphone')";
        
        if(mysqli_query($ourdata, $sql)){
            function_success("註冊成功！將跳轉至登入頁面");
        }
    }
    else{
        function_alert("該帳號已有人使用!");
        exit;
    }
}

mysqli_close($ourdata);

function function_alert($message) { 
    echo "<script>alert('$message');
     window.location.href='register.php';
    </script>"; 
    return false;
} 
function function_success($message){     
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    return false;
} 
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<head>
    <title>註冊頁面</title>
    <!-- 字體 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Noto+Serif+TC:wght@500&family=PT+Serif&family=Vollkorn&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- css js -->
    <link rel="stylesheet" href="index.css">
    <link href="../menunav.css" rel="stylesheet" />
    <link href="../內文頁/兜兜圈/doughnut.css" rel="stylesheet" />
    <link rel="stylesheet" href="../內文頁/兜兜圈/doughnut_screen.css" />
    <script src="../yancheng.js"></script>
    <link rel="icon" type="image/x-icon" href="../common img/titleicon.png" />
    <script>
        function errordata() {
            var x = document.forms["registerForm"]["password"].value;
            var y = document.forms["registerForm"]["password_check"].value;
            if (x.length < 6) {
                alert("密碼長度不足");
                return false;
            }
            if (x != y) {
                alert("請確認密碼是否輸入正確");
                return false;
            }
        }
    </script>
</head>

<body id="body">
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../主頁/yanchengtour.html">
                    <img src="../common img/titleicon.png" alt="" width="65" height="65" class="d-inline-block align-text-top" />
                    <div id="brandname">Hola Foodie</div>
                </a>
                <button id="mobile-menu">
                    <img src="../common img/more.png" alt="" class="menuicon" />
                </button>
            </div>
        </nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../主頁/yanchengtour.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#article">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../內文頁/關於我們/aboutus.html">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../登入/index.php">Member Area</a>
            </li>
        </ul>
        <div id="mobilenavbar">
            <div class="mobilenav-item">
                <a class="mnav-link" href="../主頁/yanchengtour.html">Home</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="#article">Posts</a>
            </div>
            <div class="mobilenav-item">
                <a class="mnav-link" href="../內文頁/關於我們/aboutus.html">About Us</a>
            </div>
        </div>
    </header>
    <main>
        <h1 class="register">註冊頁面</h1>
        <div class="formbox">
            <form name="registerForm" method="post" action="register.php" onsubmit="return errordata()" class="indexform">
                <label for="email" class="account">電子信箱</label>
                <input type="text" name="email" class="texttext"><br><br>

                <label for="password" class="account">密碼</label>
                <input type="password" name="password" id="password" class="texttext"><br>

                <label for="password_check">確認密碼</label>
                <input type="password" name="password_check" id="password_check" class="texttext"><br><br>
                
                <h1>基本資料</h1>
                
                <label for="nickname" class="account1">暱稱</label>
                <input type="text" name="nickname" class="texttext"><br>

                <label for="birthday">生日</label>
                <input type="date" name="birthday" value="2000-01-01" min="1900-01-01" max="2022-07-30"><br>

                <label for="gender" class="account1">性別</label>
                <input type="text" name="gender" class="texttext">

                <label for="address" class="account1">地址</label>
                <input type="text" name="address" class="texttext">

                <label for="cellphone" class="account1">手機號碼</label>
                <input type="text" name="cellphone" class="texttext">

                <input type="submit" value="註冊" name="submit" class="button">
            </form>
        </div>
    </main>

</body>

</html>