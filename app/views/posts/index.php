<?php require APPROOT.'/views/includes/header.php'; ?>
<body>
<div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php foreach($data['posts'] as $post) : ?>
            <h1 class="page-header">

            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>"><?php echo $post->title?></a>
            </h2>
            <p class="lead">
                by <a href="#"><?php echo $post->lastname; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php echo $post->postCreated?></p>
            
            <?php

            // 動画のIDを取得
            $id = get_youtube_id($post->post_url);
            // $id = get_youtube_id('https://www.youtube.com/watch?v=vRJx-em7ZRM');

            // YouTubeの埋め込みURLを作成
            $embed_url = 'https://www.youtube.com/embed/'.$id;
            // $embed_url = 'https://www.youtube.com/embed/'.'vRJx-em7ZRM';
            // HTMLを出力
            echo '<hr>';
            echo '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
            echo '<iframe src="'.$embed_url.'" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>';
            echo '</div>';
            echo '<hr>';
            ?>

            <p><?php echo $post->body?></p>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">Ask Chappie<span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php endforeach; ?>
            </div>
          </div>

<?php require APPROOT.'/views/includes/footer.php'; ?>