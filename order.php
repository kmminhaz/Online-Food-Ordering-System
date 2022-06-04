<!DOCTYPE html>
<html lang="en">
<?php include("partials/menu.php") ?>


<!-- For banner part -->
<link rel="stylesheet" type="text/css" href="CSS/order.css">
<div class="banner" style="background: url(photos/fastFood.jpg);">
    <div class="banner_back">
    </div>
    <div class="banner_information">

        <div class="item_box">
            <div class="l-name" style="width: 400px; margin-top:0px">
                <h1 style="color: coral;"> Order </h1>
                <h1 style="color: white;"> ! your Food </h1>
            </div>
            <img style="margin-top: 50px;" src="photos/divider.jpg">
            <p style="font-size: 22px; font-family:'Times New Roman', Times, serif;"> From 7:00 AM to 10:00 PM </p>
            

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST" >
                <div class="search_part">
                    <div class="search-box">
                        <input type="search" name="search" id="searchWriting" class="search_bar" name="search" placeholder="Search for Food...">
                    </div>
                </div>
                <div class="buttons-search">
                    <input type="submit" name="submit" value="Search" class="btn btn-primary" style="width: 120px; height: 45px;
                font-size:large; font-weight: bolder; background: coral; padding: 10px; color:black; margin-left: 40px;">
                </div>
            </form>

        </div>
    </div>
</div>
<br /> <br /> <br /> <br />




<?php 
    if(isset($_SESSION['order'])){

        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>




<h3 class="text-center" style="font-weight: bold;background: white; box-shadow: 5px 5px 15px 5px black; border-radius:20px; 
    height:65px; width:63%; margin:auto; padding:15px;"><a href="<?php echo SITEURL; ?>categories.php" style="color: coral; text-decoration:underline;"> Categories </a></h3>
<br /> <br />

<?php include("partials/item-slider.php") ?>






<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
<h3 class="text-center" style="font-weight: bold;background: white; box-shadow: 5px 5px 15px 5px black; border-radius:20px; 
    height:65px; width:63%; margin:auto; padding:15px;"><a href="<?php echo SITEURL; ?>categories.php" style="color: coral; text-decoration:underline;"> Faviourites </a></h3>
<br /> <br />
<?php include("partials/populer-product.php") ?>










<p class="text-center">
    <a href="<?php echo SITEURL; ?>foods.php" style="color:coral; font-weight:bolder; background: white; padding:3px;
     border-radius:5px">See All Foods</a>
</p>
<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />











<!-- For map -->
<h3 class="text-center" style="background: none; 
    height:55px; width:100%; margin:auto; padding:10px"><a href="#" style="color: coral; font-weight:bolder"> Meet Us </a></h3>
<br />
<div class="contents">
    <script src="JS/order.js" type="text/javascript"></script>
    <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt60kMMGQYpsb3WxzSqF17KcF0ovFRLO4&callback=initMap">
    </script>
    <hr class="divider">
    <div id="dvMap" style="margin-top: 20px; margin-bottom: 20px; width: 100%; height: 500px"></div>
    <hr class="divider">
</div>









<br /> <br /> <br /> <br />
<!-- For footer part -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php include("partials/footer.php") ?>