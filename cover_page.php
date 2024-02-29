    <?php
        session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover page</title>
    <link rel="stylesheet" href="./CSS/cover.css">
</head>
<body>
    <div class="page1">
        <div class="title">
            <img src="./IMAGE/logo.png" alt="">
        </div>
        <div class="btn"><a href="./home.php">Learn more</a></div>
        <div class="left"></div>
        <div class="right">
            <div class="item3">
                
                <div class="mySlides fade">
                    <img src="./IMAGE/slide1.jpeg">
                </div>
            
                <div class="mySlides fade">
                    <img src="./IMAGE/slide2.jpeg">
                </div>
                
                <div class="mySlides fade">
                    <img src="./IMAGE/slide3.jpeg">
                </div>
    
            </div>
        </div>

    </div>

    <script>
        let slideIndex = 0;
        showSlides();
        
        function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    

        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 4000); // Change image every 2 seconds

        }

        function plusDivs(n) {
          let slides = document.getElementsByClassName("mySlides");
          slideIndex += n;
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          if (slideIndex > slides.length) {slideIndex = 1}    
          slides[slideIndex-1].style.display = "block";  
        }
    </script>
</body>
</html>