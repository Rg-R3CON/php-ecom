<?php include('partials/menu.php'); ?>

<!-- <?php include('../config/connection.php'); ?> -->
<div class="main-content">
    <div class="wrapper">

        <h1>Add Admin </h1>
        <br><br>


<?php  
        if (isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
        }
?>
<br><br><br>


        <form action="" method="POST">
            <table class="tbl-30">
            
        <tr>
                <td>Full Name: </td>
                <td><input type="text" name="full_name" placeholder="your name"></td>
        </tr>
         <tr>
                <td>User Name: </td>
                <td><input type="text" name="username" placeholder="user name"></td>
        </tr>
         <tr>
                <td>password: </td>
                <td><input type="password" name="password" placeholder="user password"></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>   
        </tr>


            </table>
        </form>

    </div>
</div>






<?php include('partials/footer.php'); ?>






<?php
    //process the value from form and save it in db
   if (isset($_POST['submit'])){
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = $_POST['password'];
      // echo $full_name , $password;


      $sql = "INSERT INTO tbl_admin SET 
                full_name= '$full_name',
                username= '$username',
                password= '$password' " ;

    $res = mysqli_query($conn, $sql) or die("couldnot connect");

      if($res==TRUE){
         // echo "data insert on db ";
         //create a session variable "add".
         $_SESSION['add'] ="Admin added successfully";
         //redirect page to
         header('location:'.SITEURL.'admin/manage-admin.php');
      }
      else
      {
         // echo "data not inserted";
         // echo "data insert on db ";
         //create a session variable "add".
         $_SESSION['add'] ="fail to add admin";
         //redirect page to
         header('location:'.SITEURL.'admin/add-admin.php');
     
      }

    }

?>