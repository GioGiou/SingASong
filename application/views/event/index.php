<style>
        div.item {
                vertical-align: top;
                display: inline-block;
                text-align: center;
                width: 120px;
        }
        .slikca {
                width: 100px;
                height: 100px;
                background-color: grey;
        }
        .caption {
                display: block;
        }
        .zapakiraj{
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translateY(-50%) translateX(-50%);
        }
        .iskanje{
                text-align: center;
        }
</style>
<div class="zapakiraj">
        <div class="iskanje">
                <form>
                        <input type="text" name="search" placeholder="Išči me skupine ali posameznika">
                        <input type="submit" value="&#128269" id="buttonPrijava" >
                </form>
        </div><br/>
        <div class="iskanje">
                <a href="<?php echo site_url('glasbenik/razvrscanje/cena'); ?>"><button id="buttonPrijava" >Cena</button></a>
                <a href="<?php echo site_url('glasbenik/razvrscanje/kraj'); ?>"><button id="buttonPrijava" >Kraj</button></a>
        </div><br/>
<?php foreach ($news as $news_item): ?>
	
		<div class="item">
        <?php
               if(isset($news_item['Slika'])){
                        if($news_item['Slika']!=""){
                                echo "<img src=\"" . asset_url() .  "photos/". $news_item['Slika']."\" , class='slikca'>  ";
                        }
                        else{
                                echo "<img src=\"" . asset_url() .  "photos/Temp.jpeg\" , class='slikca'>  ";    
                        }
                }
                else{
                        echo "<img src=\"" . asset_url() .  "photos/Temp.jpeg\" , class='slikca'>  ";
                }        
        ?>
		<span class="caption">
			<h3><?php echo $news_item['Ime']; ?></h3>
			<p><?php echo $news_item['Kraj']; ?>, <?php echo $news_item['Cena']; ?>€</p>
			<p><a href="<?php echo site_url('glasbenik/'.$news_item['ID']); ?>">Preberi več</a></p>
		</span>
        </div>
	
<?php endforeach; ?>
</div>
