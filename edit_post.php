<?php 
if(file_exists(dirname(__FILE__).'/functions.php')){
    require_once(dirname(__FILE__).'/functions.php');
}
  $pageTitle = "Edit Your Post";
  include('header.php');

  if(isset($_POST['post_edit'])){
      $title   = isset($_POST['post-title'])? $_POST['post-title']:'';
      $content = isset($_POST['post-content'])? $_POST['post-content']: '';
      $id      = isset($_GET['post']) ?$_GET['post']:'';

    
      if(!empty($title) && !empty($content)){
        $connection->query("UPDATE info SET Title='$title', Content='$content' WHERE id=$id");
        
      }
  }

?>

<div class="main-area">
  <div class="container">
    <div class="row">
        <div class ="col-md-12">
       <form action="" method ="POST">

             <?php 
             $id = isset($_GET['post'])?$_GET['post']:'' ;
             $show_query = $connection->query("SELECT * FROM info WHERE id=$id");
             $fetch = $show_query->fetch_assoc();

          ?>


                <div class="form-group">
                    <label for="posttitle">Post Title:</label>
                    <input type="text" value="<?php echo $fetch['Title'];?>" name="post-title" class="form-control" id="posttitle" required>
                </div>
                <div class="form-group">
                    <label for="postcontent">Post Content</label>
                    <textarea name="post-content" id="postcontent" class="form-control" cols="30"  rows="10" required><?php echo $fetch['Content'];?></textarea> <br>
                </div>
                <input type="submit" value="Update" name="post_edit">
       </form>
       </div>
     </div>
    </div>
</div>

<?php include('footer.php');?>