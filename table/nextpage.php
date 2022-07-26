<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Kurale&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Kurale&family=Merienda+One&display=swap" rel="stylesheet">
<style>
    #background
    {
        background-image:url("images/background.jpg");
        height:500px;
        width:100%;
        background-size:cover;   
        box-shadow: 10px 10px 20px grey;     
    }
    #background p
    {
        padding: 150px;
        letter-spacing:2px;
        line-height:3rem;
        text-align: center;
        font-size:25px;
        color:white;
        text-shadow:5px 5px 10px red;
    }
    #menu
    {
        height:475px;
        width:100%;
        background-color:orange;
        color:white;

    }
 /* *:not(#menu)
    {
        box-sizing : border-box;
    } */
    
    #menu img
    {
        height:412px;
        width:100%;
        background-color:orange;
        color:white;
        transition-duration: .5s;
        object-fit:cover;
        object-position:70% 70%;
    }
    #menu p
    {
        font-family:'Times New Roman', serif;
        font-weight:bolder;
        font-size:20px;
        margin-top:10px;
    }
    #menu img:hover
    {
        width:100%;
        height:360px;
        opacity:0.8;
        object-fit:cover;
        object-position:70% 70%;
    }
    
    .step img
    {
        width:180px;
        height:180px;
        margin-top:10px;
        text-align:center;
        border:1px solid grey;
    }
    .step p
    {
        font-size:20px;
        margin-top:80px;
        text-align:center;
        font-style:italic;
        
    }
    
    .step .row
    {
        /* background-color:red;
        border-spacing:0 100px;  */
        background-color:#ffebe6;
        height:200px;
        width:80%;
        margin-left:140px;
        border-radius:10px !important;
  
    }
    .step .row:hover
    {
        /* background-color:red;
        border-spacing:0 100px;  */
        background-color:#ffebe6;
        height:200px;
        width:90%;
        font-weight:bold;
        margin-left:80px;
        border-radius:10px !important;
        box-shadow: 10px 10px 20px #ff6600;
    }
    h2
    {
        font-family: 'Cinzel Decorative', cursive;
font-family: 'Kurale', serif;
font-family: 'Merienda One', cursive;
    }
    .flip-card 
    {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
        box-shadow: 10px 10px 20px grey;
    }

    .flip-card-inner 
    {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner 
    {
        transform: rotateY(180deg);
        box-shadow: 10px 10px 20px grey;
    }

    .flip-card-front, .flip-card-back 
    {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front 
    {
        background-color: #bbb;
        color: black;
    }
    .flip-card-front img
    {
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:70% 70%;
    }
    .flip-card-back 
    {
        background-image: linear-gradient(to bottom right, red, yellow);
        color: black;
        transform: rotateY(180deg);
    }
    .flip-card-back p
    {
        color:black;
        font-size:18px;
        font-family: 'Lobster', cursive;
        letter-spacing:0.5px;
    }
    .flip-card-back h1
    {
        color:white;
        font-size:20px;
        text-decoration:underline;
    }
    #aboutus
    {
        width:100%;
        background-color:#ffe4cc;
    }
    #feedback
    {
        background-color: black;
        width:100%;
        height:260px;
        margin-top: 1px;
    }
    form
    {
        float:right;
        width:50%;
        margin-left: 90px;
        /* margin-top: 20px; */
        border-left: 2px solid white;
        height: 260px;
    
    }
    label
    {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1em;
    }
    form input[type=text],input[type=tel] ,textarea
    {
        border: 1px solid #5186d6;
        padding: 10px;
        box-shadow: 5px 5px #ff6600;
        border-radius:5px;
        width:100%;
    }
    form input[type=button]
    {
        background-color: #ff6600;
        border: 1px solid #ff6600;
        height:30px;
        width:50%;
        margin-left:150px;
        border-radius: 15px;
    }
    form input[type=button]:hover
    {
        background-color: #ff6600;
        border: 1px solid #ff6600;
        box-shadow: 5px 5px 10px #ff6600;
        color:white;
    }
    form input[type=text],input[type=tel] ,textarea:focus
    {
        border: 1px solid #ff6600;
        padding: 10px;
        box-shadow: 5px 5px 10px #ff6600;
    }
    .feedback
    {
        float:left;
        width:40%;
        line-height: 2rem;
        margin-top: 20px;
        margin-left:40px;  
    }
    .feedback .row
    {
        margin-left:100px;
        margin-top:30px;
    }
    .feedback img
    {
        width:50px;
        height:50px;
    }
    .feedback a
    {
        text-decoration: none;
        color:rgb(202, 202, 202);
    }
    footer
    {
        height:40px;
        
    }
    p
    {
        font-family: 'Crimson Text', serif;
        font-size:18px;
    }
.float-button {
position: fixed;
right: 30px;
top: 400px;
z-index: 9999;
cursor: pointer;
opacity: 0.8;
}
.float-button:hover{
  transition: all 0.4s ease-in 0s;
  opacity: 1;
}
</style>
<script>

</script>
<?php 

include_once "includes/common-includes.php";
?>
</head>
<body>
<?php 
include_once "includes/common-menu.php";
?>

    <div class="container-fluid">
        <div id="background" class="mt-3">
            <p>
                A lots of Restaurants serve good food. <br> 
                But ,They don't have very good service like us with <br> 
                easy to Order and makes you comfortable.
            </p>
        </div>
        <div id="aboutus" class="mt-5">
            <div class="row mt-4">
                <div class="col-sm-5">
                    <img src="images/aboutus.jpg" width="100%" height="100%" style="border:3px solid orange;">
                </div>
                <div class="col-sm-7">
                    <h1 class="text-center mt-2" style="font-family: 'Cinzel Decorative', cursive;">About Us</h1>
                    <p style="padding:20px;line-height:28px;font-family: 'Cinzel Decorative', cursive;font-family: 'Kurale', serif;font-weight:bold">
                        At ‘Organization Name’ , we’re tied in with presenting crisp food, regardless of whether it implies going the additional mile. When you stroll through our entryways, we do what we can to make everybody feel comfortable in light of the fact that our family stretches out through your locale.

                        ‘Organization Name’ is an organization that is continually developing. From the principal eatery in 1969, we’ve kept on extending’ vision to help other individuals end up effective entrepreneurs by owning an ‘Organization Name’ establishment. We search for franchisees who are focused on quality, not compromising.

                        Today, we can be found in numerous nations and have our sights on extending much more. Be that as it may, regardless of where you discover us, quality will dependably be our formula.

                        We Believe in Quality. All around. Quality food can’t be made without quality initiative. Find out about the general population driving The ‘Organization Name’ .
                    </p>
                </div>
            </div>
        </div>
        <div id="menu" class="mt-4">
            <h2 class="text-center font-weight-bold p-2">Our Specials</h2>
            <div class="row mt-2 text-center">
                <div class="col-sm-3" style="padding-left:15px;padding-right:0px">
                <img src="images/drinks.jpg">
                    <div class="caption">
                    <p>Drinks</p>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right:0px;padding-left:0px;">
                    <img src="images/maincourse.jpg" alt="Lights">
                    <br>
                    <div class="caption">
                    <p>Main Courses</p>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right:0px;padding-left:0px;">
                    <img src="images/starters.jpg" alt="Lights">
                    <div class="caption">
                    <p>Starters</p>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-right:15px;padding-left:0px;">
                    <img src="images/desserts.jpg" alt="Lights">
                    <div class="caption">
                    <p>Desserts</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="step mt-5 mx-5 my-5">
        <br>
            <div class="row border-left rounded-left" style="border-left:10px solid red!important;border-top-left-radius:2rem!important;border-bottom-left-radius:2rem!important;">
                <div class="col-sm-9"  class="col-border">
                    <p>Take Time To Order Your Food</p>
                </div>
                <div class="col-sm-3">
                    <img src="images/good_time.jpg" class="rounded-circle mr-5">
                </div>
            </div>
            <div class="row border-right rounder-right mt-5" style="border-right:10px solid red!important;border-top-right-radius:2rem!important;border-bottom-right-radius:2rem!important;">
                <div class="col-sm-3">
                    <img src="images/new_option.jpg" class="rounded-circle ml-5">
                </div>
                <div class="col-sm-9" class="col-border">
                    <p>Giving Your Hunger a New Option</p>
                </div>
            </div>
            <div class="row border-left rounder-left mt-5" style="border-left:10px solid red!important;border-top-left-radius:2rem!important;border-bottom-left-radius:2rem!important;">
                <div class="col-sm-9" class="col-border">
                    <p>Finally,The Joy Of Getting Best.</p>
                </div>
                <div class="col-sm-3">
                    <img src="images/order_food.png" class="rounded-circle mr-5">
                </div>
            </div>
        </div>
        <div class="specials mt-5 mb-5">
        <h2 class="text-center text-white" style="background-image: linear-gradient(to bottom right, red,  #ffd633);width:40%;height:60px;margin-left:500px;border-radius:50px;padding:10px">A Life full of Tasty Food</h2>
        <div class="row mt-5 ml-4">
            <div class="col-sm-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images/tikka.jpg" alt="Avatar" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1 style="margin-top:80px;font-size:22px">CHICKEN TIKKA</h1> 
                        <p style="text-decoration:underline;">From Rs.150</p> 
                        <p><em>Tempting chikken tikka tastes <br>so good as it looks...</em></p>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images/briyanih.jpg" alt="Avatar" >
                    </div>
                    <div class="flip-card-back">
                        <h1 style="margin-top:80px;font-size:22px">CHICKEN BRIYANI</h1> 
                        <p style="text-decoration:underline;">From Rs.200</p> 
                        <p><em>You can't buy happiness,But <br>you can buy Briyani...</em></p>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                    <img src="images/fishfinger.jpg" alt="Avatar" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1 style="margin-top:80px;font-size:22px">FISH FINGER</h1> 
                        <p style="text-decoration:underline;">From Rs.90</p> 
                        <p><em>Keep calm and eat <br> fish finger...</em></p>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                    <img src="images/lollipop.jpg" alt="Avatar" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1 style="margin-top:80px;font-size:22px">LOLLIPOP</h1> 
                        <p style="text-decoration:underline;">From Rs.30</p> 
                        <p><em>The little joys of life comes in <br>a big bite...</em></p>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            <div id="feedback">
            <form id="letschat">
            <table cellpadding="10px" cellspacing="5px">
                <tr>
                    <td>
                        <lable style="color:white;">Name</lable>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <lable style="color:white;">Email Id</lable>
                    </td>
                    <td>
                        <input type="tel" placeholder="Enter Your Mobile No">
                    </td>
                </tr>
                <tr >
                    <td>
                        <lable style="color:white;">Your Message<br> About Our Service</lable>
                    </td>
                    <td>
                       <textarea columns="100">

                       </textarea>
                    </td>
                </tr>
                <tr >
                    <td  colspan="2">
                        <center><input type="button" value="Submit" ></center>
                    </td>
                </tr>
            </table>    
        </form>
        
        <div class="feedback">
            <h2 style="color:rgb(187, 184, 184);text-align: center;margin-top:50px;">Follow Us</h2>
            <div class="row">
                <div class="col-sm-2">
                    <img src="images/twitter.png" alt="loading my photo..." >
                </div>
                <div class="col-sm-2">
                    <img src="images/facebook-new.png" alt="loading my photo..." >
                </div>
                <div class="col-sm-2">
                    <img src="images/instagram-new.png" alt="">
                </div>
                <div class="col-sm-2">
                    <img class="mt-2" src="images/whatsapp.png" alt="loading my photo..." style="width:40px;height:40px">
                </div>
            </div>
        </div>
      </div>
      <button type="button" onclick="myFunction()" class="btn btn-danger float-button ">Go Order Section</button>
    <br>
    <br>
    <br>
   
    <div class="navbar fixed-bottom" style="background-color:grey">
        <h5 class="text-center" style="margin-left:500px">@copyrights 2021 All rights reserved.</h5>
    </div>
   
    <script>
       function myFunction() {
         window.location.href="clientview.php";
       }
     </script>
</body>
</html>