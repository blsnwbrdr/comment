<?php
$host="localhost";
$username="youatemy_comments";
$password="New-Comments";
$databasename="youatemy_comments";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  
  $insert=mysql_query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP)");
  $select=mysql_query("select name,comment,post_time from comments where name='$name' and comment='$comment'");
  
  if($row=mysql_fetch_array($select))
  {
	  $name=$row['name'];
	  $comment=$row['comment'];
    $time=$row['post_time'];
  ?>
    <div class="comment_div"> 
      <p class="comment"><?php echo $comment;?></p>
      <p class="name">by: <?php echo $name;?></p>    
	    <p class="time"><?php echo $time;?></p>
	  </div>
  <?php
  }
exit;
}

?>