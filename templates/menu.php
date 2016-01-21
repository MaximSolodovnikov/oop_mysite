<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            
            <?php foreach ($row as $item):?>
                <a class="blog-nav-item <?php if($item['title_url'] == $_GET['option']) echo "active"; ?>" href="?option=<?php echo $item['title_url']; ?>"><?php echo $item['title']; ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</div>