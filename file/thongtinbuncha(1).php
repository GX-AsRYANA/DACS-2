<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>CDA-Food Map Da Nang</title>
    <link rel="stylesheet" href="dish1.css">
    <script lang="javascript">
        function swap(){
            var x = document.getElementsByClassName('main');
            var y = document.getElementById('1');
            var z = document.getElementById('2');
            var q = document.getElementById('3');
            var w = document.getElementById('4');
            var e = document.getElementById('5');
            var r = document.getElementById('6');
            var t = document.getElementById('7');
            var u = document.getElementById('8');

            if(x==x){
                swap(x,y);
                document.getElementsByClassName('h1').innerHTML="Bun dau";
                document.getElementsByClassName('mieu-ta').innerHTML="Bún đậu mắm tôm là món ăn đơn giản, dân dã trong ẩm thực miền Bắc Việt Nam. Đây là món thường được dùng như bữa ăn nhẹ, ăn chơi. Thành phần chính gồm có bún tươi, đậu hũ chiên vàng, chả cốm, nem chua, mắm tôm pha chanh, ớt và ăn kèm với các loại rau thơm như tía tô, kinh giới, rau húng, xà lách, cà pháo...[1] Cũng như các món ăn dân gian khác, giá thành rẻ nên được nhiều người giới bình dân ăn nên thu nhập của những người buôn bán những món ăn này khá cao.";
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
        <p class="h1">Bun cha</p>

            <div><img class="main" src="Picture/buncha.jpg"></div> 
            <div class="mieu-ta"><p >Bún chả là một món ăn của Việt Nam, bao gồm bún, chả thịt lợn nướng trên than hoa và bát nước mắm chua cay mặn ngọt.
                Món ăn xuất xứ từ miền Bắc Việt Nam, là thứ quà có sức sống lâu bền nhất của Hà Nội, nên có thể coi đây là một trong những đặc sản đặc trưng của ẩm thực Hà thành.
                Bún chả có nét tương tự món bún thịt nướng ở miền Trung và miền Nam, nhưng nước mắm pha có vị thanh nhẹ hơn. Bún chả là một món ăn của Việt Nam, bao gồm bún, chả thịt lợn nướng trên than hoa và bát nước mắm chua cay mặn ngọt.
                Món ăn xuất xứ từ miền Bắc Việt Nam, là thứ quà có sức sống lâu bền nhất của Hà Nội,
                nên có thể coi đây là một trong những đặc sản đặc trưng của ẩm thực Hà thành. Bún chả có nét tương tự món bún thịt nướng ở miền Trung và miền Nam, nhưng nước mắm pha có vị thanh nhẹ hơn.</p>
            </div>
        

            
            <div class="list">
                <a onclick="swap()"><img id="1" class="preview" src="Picture/bundau.jpg" alt=""></a>
                <a onclick="swap()"><img id="2" class="pe preview" src="Picture/banhmi.jpg" alt=""></a>
                <a onclick="swap()"><img id="3" class="pe preview" src="Picture/banhtrang.jpg" alt=""></a>
                <a onclick="swap()"><img id="4" class="pe preview" src="Picture/phobo.jpg" alt=""></a>
                <a onclick="swap()"><img id="5" class="pe preview" src="Picture/beefsteak.jpg" alt=""></a>
                <a onclick="swap()"><img id="6" class="pe preview" src="Picture/bibimbap.jpg" alt=""></a>
                <a onclick="swap()"><img id="7" class="pe preview" src="Picture/kimchi.jpg" alt=""></a>
                <a onclick="swap()"><img id="8" class="pe preview" src="Picture/chip.jpg" alt=""></a>
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
</body>
</html>