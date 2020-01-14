<?php session_start(); ?>
<strong>Test Form</strong>
<form action="" method"post">
    <input type="text" name="picturenum" />
    <input type="submit" name="Submit" value="Submit!" />
</form>

<?php 
if(!empty($_GET['Submit'])) 
{
$_SESSION['picturenum']= $_GET['picturenum'];
}
?>

<strong> <?php echo $_SESSION['picturenum'];?> </strong>