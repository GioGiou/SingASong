<div>
Razporedi po:<br/>
<a href="<?php echo site_url('event/');?>"><button type="button">Datumu objave</button></a>
<a href="<?php echo site_url('event/date');?>"><button type="button">Datumu dogodka</button></a> 
<a href="<?php echo site_url('event/alf');?>"><button type="button">A...Ž</button></a>   
</div>
<?php foreach ($news as $news_item): ?>
        <div>
        <h3><?php echo $news_item['Naslov']; ?></h3>
        <p><?php echo $news_item['Kraj']; ?>, <?php echo $news_item['Datum']; ?></p>
        <p><a href="<?php echo site_url('event/'.$news_item['Id']); ?>">Preberi več</a></p>
        </div>

<?php endforeach; ?>
<div>
Več:<br/>
<a href="<?php echo site_url('event/all'); ?>"><button type="button">Vsi dogodki</button></a>
<a href="<?php echo site_url('event/');?>"><button type="button">Prihajajoči dogodki</button></a>
<a href="<?php echo site_url('event/old');?>"><button type="button">Pretekli dogodki</button></a>  
</div>