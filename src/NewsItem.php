<?php

class NewsItem {

    private $title = "TITLE";
    private $shortDesc = "SHORT_DESC";
    private $type = "news";
    private $prettyType = "News";

    private $url = "https://example.com";
    private $img = "https://example.com";
    private $datePosted = "0th Decembary 0000";
    private $author;

    public function setTitle($title){
        $this->title = $title;
    }

    public function setDesc($desc){
        if (strlen($desc) > 80) $desc = substr($desc,0,80). "...";
        $this->shortDesc = $desc;
    }

    public function setType($type,$prettyType){
        $this->type = $type;
        $this->prettyType = $prettyType;
    }

    public function setURL($url){
        $this->url = $url;
    }

    public function setIMG($img){
        $this->img = $img;
    }

    public function setDate($date){
        $dateObj = new DateTime($date);
        $this->datePosted = $dateObj->format('jS F Y');
    }

    public function setAuthor($firstName,$lastName,$port){
        $a = new NewsAuthor;
        $a->setName($firstName,$lastName);
        $a->setPortrait($port);
        $this->author = $a;
    }

    public function __toString() {
        return '<div class="col-12 col-md-6 col-xl-4 newsItem newsType-'. $this->type .'">
                    <a class="overlayBanner text-uppercase" href="'. $this->url .'">'. $this->prettyType .'</a>
                    <a class="thumbnail-holder" href="'. $this->url .'">
                        <img class="thumbnail" src="'. $this->img .'" alt="Article Thumbnail">
                    </a>
                    <div class="newsItemText">
                        <a href="'. $this->url .'"><h3 class="title">'. $this->title .'</h3></a>
                        <p class="desc">'. $this->shortDesc .'</p>
                        <a class="text-uppercase readMore" href="'. $this->url .'">Read more</a>
                        <div class="give-hr-margin">
                            <hr>
                        </div>
                        <div class="author">
                            <img src="'. $this->author->getPort() .'" alt="Image of James Gulliver">
                            <h4>Posted by '. $this->author .'</h4>
                            <p>'. $this->datePosted .'</p>
                        </div>
                    </div>
                </div>';
    }

}

?>