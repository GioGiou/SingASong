<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        
        <p><a href="<?php echo site_url('event/'.$news_item['slug']); ?>">Read more</a></p>


<?php endforeach; ?>