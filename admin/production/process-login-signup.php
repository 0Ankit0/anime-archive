<?php
require('../../connection/config.php');

if (isset($_POST['Login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM  user WHERE `Email`='$email' && `Password`='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $myid = $row['id'];
    if ($result) {
        session_start();
        $_SESSION['username'] = $row['User_Name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['Role'];
        $_SESSION['Pic'] = $row['Pic'];
        switch ($row['Role']) {
            case "user":
                if ($row['status'] == 0) {
?>
                    <p>Your account is disabled?Do you want to enable it</p>
                    <div style="display: flex;">

                        <a type="button" class="follow-btn" style="border: none; margin-top: 20px;" href="disableUser.php?uid=<?php echo $id ?>">Enable account</a>
                        <a type="button" class="follow-btn" style="border: none; margin-top: 20px;" href="index.php">no</a>
                    </div>
<?php
                } else {

                    header("location:/anime-archive/");
                }
                break;
            case "creator":
                header("location:dashboard.php");
                break;
            case "admin":
                header("location:dashboard.php");
                break;
            default:
                header("location:index.php?error=true");
                break;
        }
    }
}
if (isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $username, $email, $password;
}
