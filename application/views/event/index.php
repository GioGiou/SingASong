<?php foreach ($news as $news_item): ?>
        <div>
        <h3><?php echo $news_item['Naslov']; ?></h3>
        <p><?php echo $news_item['Kraj']; ?>, <?php echo $news_item['Datum']; ?></p>
        <p><a href="<?php echo site_url('event/'.$news_item['Id']); ?>">Read more</a></p>
        </div>

<?php endforeach; ?>