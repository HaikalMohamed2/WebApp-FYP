<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <!-- Bootstrap for CSS and JS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS and JS-->
  <link href="AboutStyle.css" rel="stylesheet">
  <link href="MyStyle.css" rel="stylesheet">
  <script src="AboutScript.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg NavSet flex-column">
            <div class="container-fluid">
                <div class="logo">
                    <img src="SourceImg/SEMUJA.png" alt="SAMS">
                </div>
                <div class="d-flex align-items-center mx-auto d-lg-none">
                    <span class="mx-auto">ABOUT SAMS</span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sections 1-->
    <div class="section section1">
      <h2>About System</h2>
      <br>
      <p>An overview of the staff attendance monitoring system</p>

      <div class="clearfix">
        <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="SourceImg/sakura.png"></div>
              </div>
            </div>
          </div>

        <p>
          A paragraph of placeholder text. We're using it here to show the use of the clearfix class. 
          We're adding quite a few meaningless phrases here to demonstrate how the columns interact here with the floated image.
        </p>

        <p>
          As you can see the paragraphs gracefully wrap around the floated image. Now imagine how this 
          would look with some actual content in here, rather than just this boring placeholder text that goes on and on, 
          but actually conveys no tangible information at. It simply takes up space and should not really be read.
        </p>

        <p>
          And yet, here you are, still persevering in reading this placeholder text, hoping for some more 
          insights, or some hidden easter egg of content. A joke, perhaps. Unfortunately, there's none of that here.
        </p>
      </div>
    </div>

    <!-- Section 2 -->  
    <div class="section section2">
      <h2>About Teams</h2>
      <br>
      <div class="card-container">
        <div class="card cardStyle">
          <img src="SourceImg/InfoPicture/Info3.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card cardStyle">
          <img src="SourceImg/InfoPicture/Info3.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card cardStyle">
          <img src="SourceImg/InfoPicture/Info3.jpg" class="card-img-top" alt="">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        </div>
      </div>
    </div>


  <!-- Footer -->
  <footer class="FooterStyle">
    <div class="container">
      <span class="text-muted">@SEMUJA SAMS 2024</span>
    </div>
  </footer>
  
</body>
</html>
