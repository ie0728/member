<?php
include("config.php");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<head>
    <title>登入頁面</title>
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
    <script src="../common.js"></script>
    <link rel="icon" type="image/x-icon" href="../common img/titleicon.png" />
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
                <a class="nav-link" href="index.php">Member Area</a>
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
        <?php
        $sql = "SELECT * FROM member";
        $ro = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($ro);
        ?>            
        <div class="member"><a href="useredit.php">會員管理</a></div>
       
        <?php do { ?>
            <div class="namecard1">
                <h2><?php echo $row['nickname']; ?></h2>
                <h5><?php echo $row['gender']; ?></h5>
                <hr>
                <table class="userInfo">
                    <tr>
                        <td class="colTitle">&nbsp;&nbsp;&nbsp;ID</td>
                        <td class="colLeft"><?php echo $row['ID']; ?></td>
                    </tr>
                    <tr>
                        <td class="colTitle">帳號&nbsp;&nbsp;</td>
                        <td class="colLeft"><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="colTitle">生日&nbsp;&nbsp;</td>
                        <td class="colLeft"><?php echo $row['birthday']; ?></td>
                    </tr>
                    <tr>
                        <td class="colTitle">地址&nbsp;&nbsp;</td>
                        <td class="colLeft"><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <td class="colTitle">手機&nbsp;&nbsp;</td>
                        <td class="colLeft"><?php echo $row['cellphone']; ?></td>
                    </tr>
                    <tr>
                        <td class="colTitle">等級&nbsp;&nbsp;</td>
                        <td class="colLeft"><?php echo $row['level']; ?>
                            <?php if ($row['level'] == '1') { ?>
                                (會員)
                            <?php } else { ?>
                                (管理員)
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <div class="circle"></div>
                <div class="circle circle2"></div>
                <div class="circle3"></div>
            </div>
        <?php } while ($row = mysqli_fetch_assoc($ro)); ?>
        </table>
    </main>
</body>

</html>