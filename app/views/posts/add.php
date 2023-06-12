<?php require APPROOT.'/views/includes/header.php'; ?>
<body>
<div class="container">
<?php
  if (isset($_POST['set_url'])) {
    $post_url = $data['post_url'];
    $id = get_youtube_id($post_url);
    $embed_url = 'https://www.youtube.com/embed/'.$id;
    // Rest of your code here
  }
?>

<form action="" method="post" enctype="multipart/form-data">    
  <div class="form-group">
    <label for="post_url">Post YouTube URL</label>
    <input type="text" class="form-control" value="<?php echo $data['post_url']; ?>" name="post_url">
  </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    <input class="btn btn-primary" type="submit" name="set_url" value="Set URL">
  </div>

  <?php
    if (isset($embed_url)) {
      echo '<hr>';
      echo '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
      echo '<iframe src="'.$embed_url.'" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>';
      echo '</div>';
      echo '<hr>';
  ?>
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
      </div>
     
      <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea class="form-control "name="body" id="summernote" cols="30" rows="10"></textarea>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto">
        <input class="btn btn-primary mb-2" type="submit"name="create_post" value="Publish Post">
      </div>
  <?php
    } // Closing the if statement
  ?>
</form>


<?php require APPROOT.'/views/includes/footer.php'; ?>