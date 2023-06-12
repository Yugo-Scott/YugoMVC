<?php require APPROOT.'/views/includes/header.php'; ?>
<div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Custom jumbotron</h1>
        <p class="col-md-8 fs-4"><?php echo $data['description']; ?></p>
        <button class="btn btn-primary btn-lg" type="button">Example button</button>
      </div>
    </div>
<h1>HOMEPAGE YOUR CONTENT HERE <?php echo $data['title']; ?></h1>
<h1><?php echo URLROOT; ?></h1>

<ul>
  <?php foreach($data['posts'] as $post) : ?>
    <li><?php echo $post->title; ?></li>
  <?php endforeach; ?>
<?php echo APPROOT; ?>
<?php require APPROOT.'/views/includes/footer.php'; ?>