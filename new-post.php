<?php 
if(file_exists(dirname(__FILE__).'/functions.php')){
    require_once(dirname(__FILE__).'/functions.php');
}
  $pageTitle = "Add Your Post";
  include('header.php');

  if(isset($_POST['submit'])){
      $title   = isset($_POST['post-title'])? $_POST['post-title']:'';
      $content = isset($_POST['post-content'])? $_POST['post-content']: '';

      $query = $connection->query("INSERT INTO info(Title, Content)VALUES('$title','$content')");
      if(!empty($title) && !empty($content)){
        echo"<p>You have sucessfully upload your content </p>";
      }
  }

?>

<div class="main-area">
  <div class="container">
    <div class="row">
        <div class ="col-md-12">
       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method ="POST">
                <div class="form-group">
                    <label for="posttitle">Post Title:</label>
                    <input type="text" name="post-title" class="form-control" id="posttitle" required>
                </div>
                <div class="form-group">
                    <label for="postcontent">Post Content</label>
                    <textarea name="post-content" id="postcontent" class="form-control" cols="30"  rows="10" required></textarea> <br>
                </div>
                <input type="submit" value="Publish" name="submit">
       </form>
       </div>
     </div>
    </div>
</div>

<?php include('footer.php');?>