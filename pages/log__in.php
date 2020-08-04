
<?php
    $database_name = "test";
    $con = mysqli_connect("localhost","root","",$database_name);
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from customers where NAME='".$uname."'AND PASSWORD='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
      echo ' <script>window.location="Cart.php"</script>';
        
    }
    else{
        echo " You Have Entered Incorrect Password";
     echo ' <script>window.location="log__in.php"</script>';
    }
        
}
if(isset($_POST['cartad'])){
    echo '<script>window.location="sign_up.html"</script>';
}
?>
?>
