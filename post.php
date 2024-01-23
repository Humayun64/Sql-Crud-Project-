<?php
if(file_exists(dirname(__FILE__).'/functions.php')){
  require_once(dirname(__FILE__).'/functions.php');
}
if(isset($_GET['delete'])){
        $deleteid = $_GET['delete'];
        $connection->query("DELETE FROM info WHERE id =$deleteid");
        header('index.php');
}
  $pageTitle = "Sell All Post";
  include('header.php');




?>
<div class="main-area">
  <div class="container">
    <div class="row">
    <?php 
     $query = $connection->query("SELECT * FROM info");
   ?>
      <div class="single-post">
       <?php while($data = $query->fetch_assoc()) :?>
            <h4><?php echo $data['Title']?></h4>
            <p><?php echo $data['Content']?></p>
            <p><a href="single-post.php" target="_blank">Read More</a></p>
            <p><a href="edit_post.php?post=<?php echo $data['id']?>">Edit Post</a> <a href="?delete=<?php echo $data['id']?>">Delete Post</a></p>
            <hr>
         <?php endwhile;?>
       </div>
    
     </div>
    </div>
</div>


<?php include('footer.php');?>