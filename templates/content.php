<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php $row = array(); ?>
            <?php for($i = 0; $i < mysql_num_rows($result); $i++): ?>
            <?php $row = mysql_fetch_array($result, MYSQL_ASSOC); ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?= $row['title']; ?></h2>
                <p class="blog-post-meta"><?= $row['date']; ?></p>
                <p><?= $row['text']; ?></p>
            </div><!-- /.blog-post -->
            <?php endfor; ?>