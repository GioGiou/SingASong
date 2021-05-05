<?php foreach ($news as $news_item): ?>
        <div>
        <?php
               if(isset($news_item['Slika'])){
                        if($news_item['Slika']!=""){
                                echo "<img src=\"" . asset_url() .  "photos/". $news_item['Slika']."\">  ";
                        }
                        else{
                                echo "<img src=\"" . asset_url() .  "photos/Temp.jpeg\">  ";    
                        }
                }
                else{
                        echo "<img src=\"" . asset_url() .  "photos/Temp.jpeg\">  ";
                }        
        ?>
        <h3><?php echo $news_item['Ime']; ?></h3>
        <p><?php echo $news_item['Kraj']; ?>, <?php echo $news_item['Cena']; ?>€</p>
        <p><a href="<?php echo site_url('glasbenik/'.$news_item['ID']); ?>">Preberi več</a></p>
        </div>

<?php endforeach; ?>
<div>
