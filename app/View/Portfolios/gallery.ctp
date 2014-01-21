<?php $url = "{$this->webroot}img/gallery/"; ?>

<div id="bg"><a href="#" class="nextImageBtn" title="next"></a><a href="#" class="prevImageBtn" title="previous"></a><img src="<?php echo $url."Universe_and_planets_digital_art_wallpaper_denebola.jpg" ?>" width="1680" height="1050" alt="Denebola" title="Denebola" id="bgimg" /></div>
<div id="preloader"><img src="<?php echo $url."ajax-loader_dark.gif" ?>" width="32" height="32" /></div>
<div id="img_title"></div>
<div id="toolbar"><a href="#" title="Maximize" onClick="ImageViewMode('full');
        return false"><img src="<?php echo $url."toolbar_fs_icon.png"?>" width="50" height="50"  /></a></div>
<div id="thumbnails_wrapper">
    <div id="outer_container">
        <div class="thumbScroller">
            <div class="container">
                <div class="content">
                    <div>
                        <a href="<?php echo $url."Universe_and_planets_digital_art_wallpaper_denebola.jpg" ?>">
                            <img src="<?php echo $url."Universe_and_planets_digital_art_wallpaper_albireo_thumb.jpg";?>" title="Denebola" alt="Denebola" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_lux.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_lux_thumb.jpg"; ?>" title="Lux Aeterna" alt="Lux Aeterna" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_dk.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_dk_thumb.jpg" ?>" title="X-Wing on patrol" alt="X-Wing on patrol" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_albireo.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_albireo_thumb.jpg" ?>" title="Albireo Outpost" alt="Albireo Outpost" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_church.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_church_thumb.jpg" ?>" title="Church of Heaven" alt="Church of Heaven" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_Decampment.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_Decampment_thumb.jpg" ?>" title="Decampment" alt="Decampment" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_Hibernaculum.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_Hibernaculum_thumb.jpg" ?>" title="Hibernaculum" alt="Hibernaculum" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_lucernarium.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_lucernarium_thumb.jpg" ?>" title="Supremus Lucernarium" alt="Supremus Lucernarium" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_moons.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_moons_thumb.jpg" ?>" title="Aurea Mediocritas" alt="Aurea Mediocritas" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_praedestinatio.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_praedestinatio_thumb.jpg" ?>" title="Praedestinatio" alt="Praedestinatio" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_transitorius.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_transitorius_thumb.jpg" ?>" title="Transitorius" alt="Transitorius" class="thumb" />
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div>
                        <a href="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_victimofgravity.jpg" ?>">
                            <img src="<?php echo $url . "Universe_and_planets_digital_art_wallpaper_victimofgravity_thumb.jpg" ?>" title="Victim of Gravity" alt="Victim of Gravity" class="thumb" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
//config
//set default images view mode
    $defaultViewMode = "full"; //full, normal, original
    $tsMargin = 30; //first and last thumbnail margin (for better cursor interaction)
    $scrollEasing = 600; //scroll easing amount (0 for no easing)
    $scrollEasingType = "easeOutCirc"; //scroll easing type
    $thumbnailsContainerOpacity = 0.8; //thumbnails area default opacity
    $thumbnailsContainerMouseOutOpacity = 0; //thumbnails area opacity on mouse out
    $thumbnailsOpacity = 0.6; //thumbnails default opacity
    $nextPrevBtnsInitState = "show"; //next/previous image buttons initial state ("hide" or "show")
    $keyboardNavigation = "on"; //enable/disable keyboard navigation ("on" or "off")

//cache vars
    $thumbnails_wrapper = $("#thumbnails_wrapper");
    $outer_container = $("#outer_container");
    $thumbScroller = $(".thumbScroller");
    $thumbScroller_container = $(".thumbScroller .container");
    $thumbScroller_content = $(".thumbScroller .content");
    $thumbScroller_thumb = $(".thumbScroller .thumb");
    $preloader = $("#preloader");
    $toolbar = $("#toolbar");
    $toolbar_a = $("#toolbar a");
    $bgimg = $("#bgimg");
    $img_title = $("#img_title");
    $nextImageBtn = $(".nextImageBtn");
    $prevImageBtn = $(".prevImageBtn");

    $(window).load(function() {
        $url = "http://localhost/aboundinginlove/app/webroot/img/gallery/";

        $toolbar.data("imageViewMode", $defaultViewMode); //default view mode
        if ($defaultViewMode == "full") {
            $toolbar_a.html("<img src='"+$url+"toolbar_n_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('normal');return false").attr("title", "Restore");
        } else {
            $toolbar_a.html("<img src='"+$url+"toolbar_fs_icon.png' width='50' height='50'  />").attr("onClick", "ImageViewMode('full');return false").attr("title", "Maximize");
        }
        ShowHideNextPrev($nextPrevBtnsInitState);
        //thumbnail scroller
        $thumbScroller_container.css("marginLeft", $tsMargin + "px"); //add margin
        sliderLeft = $thumbScroller_container.position().left;
        sliderWidth = $outer_container.width();
        $thumbScroller.css("width", sliderWidth);
        var totalContent = 0;
        fadeSpeed = 200;

        var $the_outer_container = document.getElementById("outer_container");
        var $placement = findPos($the_outer_container);

        $thumbScroller_content.each(function() {
            var $this = $(this);
            totalContent += $this.innerWidth();
            $thumbScroller_container.css("width", totalContent);
            $this.children().children().children(".thumb").fadeTo(fadeSpeed, $thumbnailsOpacity);
        });

        $thumbScroller.mousemove(function(e) {
            if ($thumbScroller_container.width() > sliderWidth) {
                var mouseCoords = (e.pageX - $placement[1]);
                var mousePercentX = mouseCoords / sliderWidth;
                var destX = -((((totalContent + ($tsMargin * 2)) - (sliderWidth)) - sliderWidth) * (mousePercentX));
                var thePosA = mouseCoords - destX;
                var thePosB = destX - mouseCoords;
                if (mouseCoords > destX) {
                    $thumbScroller_container.stop().animate({left: -thePosA}, $scrollEasing, $scrollEasingType); //with easing
                } else if (mouseCoords < destX) {
                    $thumbScroller_container.stop().animate({left: thePosB}, $scrollEasing, $scrollEasingType); //with easing
                } else {
                    $thumbScroller_container.stop();
                }
            }
        });

        $thumbnails_wrapper.fadeTo(fadeSpeed, $thumbnailsContainerOpacity);
        $thumbnails_wrapper.hover(
                function() { //mouse over
                    var $this = $(this);
                    $this.stop().fadeTo("slow", 1);
                },
                function() { //mouse out
                    var $this = $(this);
                    $this.stop().fadeTo("slow", $thumbnailsContainerMouseOutOpacity);
                }
        );

        $thumbScroller_thumb.hover(
                function() { //mouse over
                    var $this = $(this);
                    $this.stop().fadeTo(fadeSpeed, 1);
                },
                function() { //mouse out
                    var $this = $(this);
                    $this.stop().fadeTo(fadeSpeed, $thumbnailsOpacity);
                }
        );

        //on window resize scale image and reset thumbnail scroller
        $(window).resize(function() {
            FullScreenBackground("#bgimg", $bgimg.data("newImageW"), $bgimg.data("newImageH"));
            $thumbScroller_container.stop().animate({left: sliderLeft}, 400, "easeOutCirc");
            var newWidth = $outer_container.width();
            $thumbScroller.css("width", newWidth);
            sliderWidth = newWidth;
            $placement = findPos($the_outer_container);
        });

        //load 1st image
        var the1stImg = new Image();
        the1stImg.onload = CreateDelegate(the1stImg, theNewImg_onload);
        the1stImg.src = $bgimg.attr("src");
        $outer_container.data("nextImage", $(".content").first().next().find("a").attr("href"));
        $outer_container.data("prevImage", $(".content").last().find("a").attr("href"));
    });

    function BackgroundLoad($this, imageWidth, imageHeight, imgSrc) {
        $this.fadeOut("fast", function() {
            $this.attr("src", "").attr("src", imgSrc); //change image source
            FullScreenBackground($this, imageWidth, imageHeight); //scale background image
            $preloader.fadeOut("fast", function() {
                $this.fadeIn("slow");
            });
            var imageTitle = $img_title.data("imageTitle");
            if (imageTitle) {
                $this.attr("alt", imageTitle).attr("title", imageTitle);
                $img_title.fadeOut("fast", function() {
                    $img_title.html(imageTitle).fadeIn();
                });
            } else {
                $img_title.fadeOut("fast", function() {
                    $img_title.html($this.attr("title")).fadeIn();
                });
            }
        });
    }

//mouseover toolbar
    if ($toolbar.css("display") != "none") {
        $toolbar.fadeTo("fast", 0.4);
    }
    $toolbar.hover(
            function() { //mouse over
                var $this = $(this);
                $this.stop().fadeTo("fast", 1);
            },
            function() { //mouse out
                var $this = $(this);
                $this.stop().fadeTo("fast", 0.4);
            }
    );

//Clicking on thumbnail changes the background image
    $("#outer_container a").click(function(event) {
        event.preventDefault();
        var $this = $(this);
        GetNextPrevImages($this);
        GetImageTitle($this);
        SwitchImage(this);
        ShowHideNextPrev("show");
    });

//next/prev images buttons
    $nextImageBtn.click(function(event) {
        event.preventDefault();
        SwitchImage($outer_container.data("nextImage"));
        var $this = $("#outer_container a[href='" + $outer_container.data("nextImage") + "']");
        GetNextPrevImages($this);
        GetImageTitle($this);
    });

    $prevImageBtn.click(function(event) {
        event.preventDefault();
        SwitchImage($outer_container.data("prevImage"));
        var $this = $("#outer_container a[href='" + $outer_container.data("prevImage") + "']");
        GetNextPrevImages($this);
        GetImageTitle($this);
    });

//next/prev images keyboard arrows
    if ($keyboardNavigation == "on") {
        $(document).keydown(function(ev) {
            if (ev.keyCode == 39) { //right arrow
                SwitchImage($outer_container.data("nextImage"));
                var $this = $("#outer_container a[href='" + $outer_container.data("nextImage") + "']");
                GetNextPrevImages($this);
                GetImageTitle($this);
                return false; // don't execute the default action (scrolling or whatever)
            } else if (ev.keyCode == 37) { //left arrow
                SwitchImage($outer_container.data("prevImage"));
                var $this = $("#outer_container a[href='" + $outer_container.data("prevImage") + "']");
                GetNextPrevImages($this);
                GetImageTitle($this);
                return false; // don't execute the default action (scrolling or whatever)
            }
        });
    }

    function ShowHideNextPrev(state) {
        if (state == "hide") {
            $nextImageBtn.fadeOut();
            $prevImageBtn.fadeOut();
        } else {
            $nextImageBtn.fadeIn();
            $prevImageBtn.fadeIn();
        }
    }

//get image title
    function GetImageTitle(elem) {
        var title_attr = elem.children("img").attr("title"); //get image title attribute
        $img_title.data("imageTitle", title_attr); //store image title
    }

//get next/prev images
    function GetNextPrevImages(curr) {
        var nextImage = curr.parents(".content").next().find("a").attr("href");
        if (nextImage == null) { //if last image, next is first
            var nextImage = $(".content").first().find("a").attr("href");
        }
        $outer_container.data("nextImage", nextImage);
        var prevImage = curr.parents(".content").prev().find("a").attr("href");
        if (prevImage == null) { //if first image, previous is last
            var prevImage = $(".content").last().find("a").attr("href");
        }
        $outer_container.data("prevImage", prevImage);
    }

//switch image
    function SwitchImage(img) {
        $preloader.fadeIn("fast"); //show preloader
        var theNewImg = new Image();
        theNewImg.onload = CreateDelegate(theNewImg, theNewImg_onload);
        theNewImg.src = img;
    }

//get new image dimensions
    function CreateDelegate(contextObject, delegateMethod) {
        return function() {
            return delegateMethod.apply(contextObject, arguments);
        }
    }

//new image on load
    function theNewImg_onload() {
        $bgimg.data("newImageW", this.width).data("newImageH", this.height);
        BackgroundLoad($bgimg, this.width, this.height, this.src);
    }

//Image scale function
    function FullScreenBackground(theItem, imageWidth, imageHeight) {
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        if ($toolbar.data("imageViewMode") != "original") { //scale
            var picHeight = imageHeight / imageWidth;
            var picWidth = imageWidth / imageHeight;
            if ($toolbar.data("imageViewMode") == "full") { //fullscreen size image mode
                if ((winHeight / winWidth) < picHeight) {
                    $(theItem).attr("width", winWidth);
                    $(theItem).attr("height", picHeight * winWidth);
                } else {
                    $(theItem).attr("height", winHeight);
                    $(theItem).attr("width", picWidth * winHeight);
                }
                ;
            } else { //normal size image mode
                if ((winHeight / winWidth) > picHeight) {
                    $(theItem).attr("width", winWidth);
                    $(theItem).attr("height", picHeight * winWidth);
                } else {
                    $(theItem).attr("height", winHeight);
                    $(theItem).attr("width", picWidth * winHeight);
                }
                ;
            }
            $(theItem).css("margin-left", (winWidth - $(theItem).width()) / 2);
            $(theItem).css("margin-top", (winHeight - $(theItem).height()) / 2);
        } else { //no scale
            $(theItem).attr("width", imageWidth);
            $(theItem).attr("height", imageHeight);
            $(theItem).css("margin-left", (winWidth - imageWidth) / 2);
            $(theItem).css("margin-top", (winHeight - imageHeight) / 2);
        }
    }

//Image view mode function - fullscreen or normal size
    function ImageViewMode(theMode) {
        $url = "http://localhost/aboundinginlove/app/webroot/img/gallery/";

        $toolbar.data("imageViewMode", theMode);
        FullScreenBackground($bgimg, $bgimg.data("newImageW"), $bgimg.data("newImageH"));
        if (theMode == "full") {
            $toolbar_a.html("<img src='"+$url+"toolbar_n_icon.png' width='50' height='50'/>").attr("onClick", "ImageViewMode('normal');return false").attr("title", "Restore");
        } else {
            $toolbar_a.html("<img src='"+$url+"toolbar_fs_icon.png' width='50' height='50'/>").attr("onClick", "ImageViewMode('full');return false").attr("title", "Maximize");
        }
    }

//function to find element Position
    function findPos(obj) {
        var curleft = curtop = 0;
        if (obj.offsetParent) {
            curleft = obj.offsetLeft
            curtop = obj.offsetTop
            while (obj = obj.offsetParent) {
                curleft += obj.offsetLeft
                curtop += obj.offsetTop
            }
        }
        return [curtop, curleft];
    }
</script>