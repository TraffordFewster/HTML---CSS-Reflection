<?php 

// $news1 = new NewsItem();
// $news1->setTitle("Happy 25th Birthday Gabriel!");
// $news1->setDesc("This week, we celebrate Gabriel Hamilton's 25th Birthday! Gabriel is one of the IT technicians based...");
// $news1->setURL("https://www.netmatters.co.uk/may-2021-notables");
// $news1->setIMG("https://www.netmatters.co.uk/assets/images/thumbnails/thumb/may-2021-notables-B8cl.jpg");
// $news1->setAuthor("Netmatters","ltd","https://www.netmatters.co.uk/assets/images/thumbnails/article_contact_thumb/netmatters-ltd-VXAv.webp");
// $news1->setDate("01-01-2000")

    $newsObjs = [];
    try {
    $sql = "SELECT i.id, i.title, i.content, i.image, i.date, i.type, d.shortName, a.first_name, a.last_name, a.portrait ". 
        "FROM news_items AS i ".
        "LEFT OUTER JOIN news_departments AS d ON d.id=i.department ".
        "LEFT OUTER JOIN news_authors AS a ON a.id=i.author_id ". 
        "ORDER BY date LIMIT 3;";
    foreach ($db->query($sql) as $row) {
        $newsObj = new NewsItem();
        $newsObj->setTitle($row["title"]);
        $desc = strip_tags($row["content"]);
        $newsObj->setDesc($desc);
        $newsObj->setURL("news.php?i=". $row["id"] . "&t=" . urlencode($row["title"]));
        $newsObj->setIMG($row["image"]);
        $newsObj->setAuthor($row["first_name"],$row["last_name"],$row["portrait"]);
        $newsObj->setDate($row["date"]);
        $newsObj->setType($row["shortName"],$row["type"]);
        $newsObjs[] = $newsObj;
    }
    } catch (Exception $e) {
        echo $e;
    }

?>

<section class="newsSection">
    <div class="container-md newsSelector text-uppercase">
        <h2>latest</h2>
    </div>
    <div class="newsContainerBG">
        <div class="container-md newsContainer">
            <div class="row align-items-stretch">
                <?php echo $newsObjs[0]; ?>
                <?php echo $newsObjs[1]; ?>
                <?php echo $newsObjs[2]; ?>
            </div>
        </div>
    </div>
    
</section>