<?php
require 'functions.php';

if (isset($_POST["submit"])) {

    if (tempah($_POST) > 0) {
        echo "
        <script>
            alert('gelanggan berjaya ditempah!');
            document.location.href = 'list_tempahan.php'
            
        </script>";
    } else {
        echo "  
        <script>
        alert('gelanggan gagal ditempah!');
        
    </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempahan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">System bookings court ciast</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">System bookings court ciast</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="tempahan.php">Fasiliti</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Log out</a>
          </li>
      
      </div>
    </div>
  </div>
</nav>

    <h1>Tempahan gelanggang</h1>
    <br>
    <br>
   
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://assets.hmetro.com.my/images/articles/fts_cropped_1505627891.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tempah Sekarang!!
                    </button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://w0.peakpx.com/wallpaper/603/445/HD-wallpaper-tennis-court-hills-trees-sport.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tempah Sekarang!!
                    </button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://apicms.thestar.com.my/uploads/images/2022/10/26/1790668.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tempah Sekarang!!
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bookings</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama" id="nama" hidden>
                    <input type="text" name="gelanggang" id="gelanggang" hidden>
                    <form action="" method="post">
                        <ul>
                            <li>
                                <label for="tarikh">TARIKH :</label><br>
                                <input type="date" name="tarikh" id="tarikh">
                            </li>
                            <li>
                                <label for="mula">MASA MULAI :</label><br>
                                <input type="time" name="masa_mulai" id="mula">
                            </li>
                            <li>
                                <label for="akhir">MASA BERAKHIR :</label><br>
                                <input type="time" name="masa_berakhir" id="akhir">
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" type="submit" name="submit">Bookings now</button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <a href="list_tempahan.php" style="text-decoration: none;">Senarai Tempahan</a>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>