<?php require APPROOT.'/views/includes/header.php'; ?>
<h1>HOMEPAGE YOUR CONTENT HERE <?php echo $data['title']; ?></h1>
<ul>
  <?php foreach($data['posts'] as $post) : ?>
    <li><?php echo $post->title; ?></li>
  <?php endforeach; ?>
<?php echo APPROOT; ?>
<?php require APPROOT.'/views/includes/footer.php'; ?>