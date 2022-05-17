<?php

/*****************************editacc.php*******************************
修改會員資料的頁面其實可以和新增會員的頁面做在一起，但為了未來管理程式碼的方便，
所以還是決定拆成兩個檔案來製作，這裏比較需要注意的地方還是在於上傳相片的管理及資
料庫資料更新的同步上，另外，修改會員的功能可以同時增加對資料判斷，比如資料如果沒
有更新就不做連線資料庫的動作，或是如果沒有上傳相片也可以更新資料之類的，修改完畢
後則是直接導回會員管理頁面．
 ************************************************************************/
include('config.php');
?>
<DOCTYPE html>
    <html>

    <head>
        <title>修改會員資料</title>
        <link href="user.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        if (isset($_GET['email'])) {
            $id = $_GET['ID'];
            $email = $_GET['email'];
            $password = $_GET['password'];
            $nickname = $_GET['nickname'];
            $birthday = $_GET['birthday'];
            $gender = $_GET['gender'];
            $address = $_GET['address'];
        } else {
            $email = "";
            $id = "";
        }
        if (isset($_POST['email'])) {
            $id = $_POST['ID'];
            $email = $_POST['email'];
            $sql = "UPDATE user
            SET email = '$email'
            WHERE ID= '$id' ";

            if (mysqli_query($link, $sql)) {
                echo '修改成功!';
                echo '';
            } else {
                echo '修改失敗!';
                echo '';
            }
        }
        ?>
        <form action="useredit.php" method="post">
            <table class="edituser">
                <tr>
                    <td class="title">欲修改之會員ID</td>
                    <td class="content">
                        <input name="ID" type="text" value="<?php echo $id; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title">帳號</td>
                    <td class="content">
                        <input name="email" type="text" value="<?php echo $email; ?>" />
                    </td>
                </tr> 
                <tr> 
                    <td colspan="2" style="text-align:center;">
                        <input name="" type="submit" value="確認修改" />
                    </td>
                </tr>
            </table>
        </form>
    </body>

    </html>