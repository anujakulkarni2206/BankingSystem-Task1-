<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

 <body>
    <section class="main">
        <nav id="navbar">
            <div id="logo">
                <img src="IMG/logo.png" alt="">
                <a class="main-tagline">Welcome To The Sparks Bank <br>
                    <span class="sub-tagline">A<span style="color:#B22222"> G</span><span style="color:#1E90FF">R</span><span style="color:#32CD32">I</span><span>P</span>
                     On Your Security</span>
                </a>
            </div>
            <ul class="menu">
                <li class="item"><a href="index.php" class="active">Home</a></li>
                <li class="item"><a href="customers.php">Our Customers</a></li>
                <li class="item"><a href="transactionhistory.php">Transaction History</a></li>
                <li class="item"><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>

    </section>
    <div class="slideshow-container fade">

        <div class="Containers">
            <img src="IMG/1.jpg" style="width:100%">
        </div>
        <div class="Containers">
            <img src="IMG/2.jpg" style="width:100%">
        </div>
        <div class="Containers">
            <img src="IMG/3.jpg" style="width:100%">
        </div>

    </div>

    <script type="text/javascript">
        var slidePosition = 0;
        SlideShow();

        function SlideShow() {
            var i;
            var slides = document.getElementsByClassName("Containers");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slidePosition++;
            if (slidePosition > slides.length) {
                slidePosition = 1
            }
            slides[slidePosition - 1].style.display = "block";
            setTimeout(SlideShow, 3000)
        };
    </script>

 </body>

</html>