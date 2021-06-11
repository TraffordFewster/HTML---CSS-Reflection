<?php 

$news1 = new NewsItem();
$news1->setTitle("Happy 25th Birthday Gabriel!");
$news1->setDesc("This week, we celebrate Gabriel Hamilton's 25th Birthday! Gabriel is one of the IT technicians based...");
$news1->setURL("https://www.netmatters.co.uk/may-2021-notables");
$news1->setIMG("https://www.netmatters.co.uk/assets/images/thumbnails/thumb/may-2021-notables-B8cl.jpg");
$news1->setAuthor("Netmatters","ltd","https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp");
$news1->setDate("01-01-2000")
?>

<section class="newsSection">
    <div class="container-md newsSelector text-uppercase">
        <h2>latest</h2>
    </div>
    <div class="newsContainerBG">
        <div class="container-md newsContainer">
            <div class="row align-items-stretch">
                <?php echo $news1; ?>
                <?php echo $news1; ?>
                <?php echo $news1; ?>
            </div>
        </div>
    </div>
    
</section>