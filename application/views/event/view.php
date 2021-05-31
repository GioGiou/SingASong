<style>
    body{
        background-color: gray;
    }
    .profile{
    position: fixed;
    top: 35%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    width: 100%;
    background-color: gray;
    }
    .slika{
        display: inline-block;
        vertical-align: top;
        width: 46%;
        margin: 20px 30px 10px 10px;
    }
    .img{
        height: 100px;
    }
    .opis{
        display: inline-block;
        width: 46%;
        text-align: center;
        left: 0;
        right:0;
    }
    .sredina{
        text-align: center;
        position: fixed;
        left: 0;
        right:0;
    }
    .icon{
        width: 50px;
        
    }
</style>
<div class = "profile">
    <div class="sredina">
        <div class="slika">
            <img src="<?php echo asset_url();?>photos/<?php echo $photo;?>" class="img">
        </div>
            <div>
                <h3><?php echo $news_item['Ime']; ?></h3>
            </div>
            <p><?php echo $news_item['Opis']; ?></p>
            <p><?php echo $news_item['Kraj']; ?>, <?php echo $news_item['Cena']; ?>€</p>
            <br/>
            <div class="sredina">
                <a href="<?php echo $news_item['FB']; ?>"><img src="<?php echo asset_url();?>icons/Facebook.png" class="icon"></a>
                <a href="<?php echo $news_item['Insta']; ?>"><img src="<?php echo asset_url();?>icons/Instagram.png" class="icon"></a>
                <a href="<?php echo $news_item['SC']; ?>"><img src="<?php echo asset_url();?>icons/Soundcloud.png" class="icon"></a>
                <a href="<?php echo $news_item['YT']; ?>"><img src="<?php echo asset_url();?>icons/Youtube.png" class="icon"></a>
                <img src="<?php echo asset_url();?>icons/Telephone.png" class="icon" onclick="alert(<?php echo $news_item['Tel']; ?>)">
            </div>
    </div>
</div>