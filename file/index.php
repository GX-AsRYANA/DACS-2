<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDA-Food Map Da Nang</title>
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="index.css">

    <script language="javascript">
        
        function showme()
            {
                var y = document.getElementById('name').value;
                var x = document.getElementById('email').value;
                // var reg = /^\w+@\w+\.com$/i;

                if(x == "" || y == "" ){
                    document.getElementById('alert').innerHTML = "Please, fill the login information!!";
                    return;
                }
                // else if(reg.test(x) == false){
                // document.getElementById('alert').innerHTML = "The email is invalid!!";
                // return;
                // }
                else if(x != "todonghieu2@gmail.com" ){
                    document.getElementById('alert').innerHTML = "You must have login before send the request!!";
                    return;
                }
                else if(x == "todonghieu2@gmail.com" ){
                    document.getElementById('alert').innerHTML = "The request is accepted!!";
                    return;
                }
            }
        
        
    </script>
</head>
<body>
    <div class="header">
        <div class="search">
            <div class="header-logo">
                <a href="giaodiengoiy.html"><img src="Picture/logo.jpg" alt="" class="mainlogo"></a>
            </div>
            
            <div class="fixed">
                <input class="input" type="text" placeholder="What are you looking for?">
                <a href=""><i class="icontimkiem fa-solid fa-magnifying-glass"></i></a>   
                <a href="index.html" target="_self" class="t-head text" ><b>Choose a Place</b></a>
                <a href="login.html" target="_self" class="text"><b>Sign in</b></a>
                <i class="iconmenu fa-solid fa-bars"></i>
            
            </div> 
        
        </div>
        <div class="title">
        <hr class="straight" size="1px"  width="100%" color="black" />  
        <p class="slogan">ENJOY YOUR MEAL!!!</p>
        <hr class="straight" size="1px"  width="100%" color="#f6f5f7" /> 
        </div>
    </div>
    <div class="body">
        <div class="title1">
            <div class="search2">
                <input type="text" placeholder="Enter address.." >
                <a href=""><i class="icontimkiem2 fa-solid fa-magnifying-glass"></i></a>
                <div class="menu">
                        <h3 class="menu_heading"><i class="icon2 fa-solid fa-caret-down"></i><a class="text1">filter</a></h3>
                        <ul class="menu_list">
                            <li class="menu_item">Viet Nam</li>
                            <li class="menu_item">Korea</li>
                            <li class="menu_item">Japan</li>
                            <li class="menu_item">European</li>
                            <li class="menu_item">China</li>
                        </ul>   
                </div>
            </div>
            <div class="map">
                <div class="dangki">
                    <p class="notice">Get notified of new locations.</p>
                    <input class="label" type="text" placeholder="Your name" id="name"><br>
                    <input class="label" type="text" placeholder="Your email" id="email"><br>
                    <p id="alert"></p>
                    <button class="button" onclick="showme()">NOTIFY ME!</button>
                </div>
                <div>
                    <iframe class="main-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490735.2331805526!2d107.79722559218753!3d16.07228582571521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2sDa%20Nang%2C%20Vietnam!5e0!3m2!1sen!2s!4v1653073846273!5m2!1sen!2s" width="58%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="footer">
                <div class="grid">
                    <div class="grid_row">
                        <div class="grid_colum">
                            <h3 class="footer_heading">About</h3>
                            <ul class="footer_list">
                                <li class="footer_item">
                                    <a href="">Support/Help</a>
                                </li>
                                <li class="footer_item">   
                                    <a href="">Contact</a>
                                </li>
                                <li class="footer_item">    
                                    <a href="">Privacy Notice</a>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_colum">
                            <h3 class="footer_heading">CDA-FMDN</h3>
                            <img src="Picture/logo2.jpg" class="p-img partner">
                        </div>
                        <div class="grid_colum">
                            <h3 class="footer_heading">Follow us</h3>
                            <ul class="footer_list">
                                <li class="footer_item">
                                    <a href="">
                                        <i class="footer_item_icon fa-brands fa-facebook"></i>
                                        Facebook
                                    </a>
                                </li>
                                <li class="footer_item">    
                                    <a href="">
                                        <i class="footer_item_icon fa-brands fa-instagram"></i>
                                        Instagram
                                    </a>
                                </li>
                                <li class="footer_item">    
                                    <a href="">
                                        <i class="footer_item_icon fa-brands fa-telegram"></i>
                                        TeleGram
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_colum">
                            <h3 class="footer_heading">Partner</h3>
                            <img class="partner" src="Picture\logo.webp" alt="">
                        </div>


                    </div>

                </div>

            </div>                     
        </div>        
    </div>
        
            
        
</body>
</html>