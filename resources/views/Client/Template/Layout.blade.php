<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Client View</title>
  </head>
   <style>
      .footer-section{
        z-index: 1050;
      }
      .cart:hover {
        color: danger;
      }
      .collapsible{
         cursor: pointer;
       }
      .collpeContent{
        display: none;
      }
      #mesBtn{
        cursor: pointer;
      }
    
   </style>
  <body>
         <div class="container-fluid">
          <div class="row g-0">
            <!-- nav bar section -->
             <div class="col-2 bg-light p-0" >
              <nav class="col-2 pe-3" style="position: fixed;" >
              <h1 class="h4 py-3 text-center text-primary">
              <i class="fa fa-ghost me-2"></i>
               <span class="d-none d-lg-inline">
                 {{Auth()->user()->name}}
               </span>
              </h1>
               <div class="list-group text-center text-lg-start">
                 <span class="list-group-item disable d-none d-lg-block">
                  <small>Control</small>
                 </span>
                 <a href="/client" class="list-group-item list-group-item-action {{Request::segment(2) == '' ? 'active' : '' }}">
                   <i class="fa fa-home"></i>
                    <span class="d-none d-lg-inline">Home</span>
                 </a>
                 <a href="" class="list-group-item list-group-item-action ">
                   <i class="fa fa-user"></i>
                    <span class="d-none d-lg-inline">About As</span>
                 </a>
                 <a href="/client/report" class="list-group-item list-group-item-action ">
                   <i class="fa fa-flag"></i>
                    <span class="d-none d-lg-inline">Report</span>
                 </a>
               </div>
               <div class="list-group text-center text-lg-start mt-4 ">
                 <span class="list-group-item disable d-none d-lg-block">
                   <small>Action</small>
                 </span>
                 <a href="/client/orderlist" class="list-group-item list-group-item-action {{Request::segment(2) == 'orderlist' ? 'active' : '' }}">
                 <i class="fa-solid fa-cart-shopping"></i>
                 <span class="d-none d-lg-inline">Order</span>
                 </a>
                 <a href="/client/upload" class="list-group-item list-group-item-action {{Request::segment(2) == 'upload' ? 'active' : '' }}">
                 <i class="fa-solid fa-upload"></i>
                 <span class="d-none d-lg-inline">Upload</span>
                 </a>
               </div>
             </nav>
             </div>
            <!-- end nav bar section -->
            <div class="col-10">
             <div class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                  <div class="flex-fill"></div>
                   <div class="navbar nav ">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle" style="margin-left:100px;"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                          <?php 
                            $user = Auth::user();
                          ?>
                          <form action="/client/login/{{$user->id}}" method="POST">
                             @csrf
                             @method('DELETE')
                              <button type="submit" style="border:none;background-color:white;margin-left:10px;">Logout</button>
                          </form>
                        </li>
                      </ul>
                     </li>
                  <li class="nav-item">
                    <a href="#">
                      <i class="fa fa-cog"></i>
                    </a>
                  </li>
                  </div>
                </div>
                <div class="main-content">
                    <main class="bg-secondary">
                <!-- content section -->
                       @yield('content')
                <!-- end content section -->
                </main>
                </div>
               </div>
             </div>
          </div><br><br><br>
          <div class="footer-section fixed-bottom bg-light">
          <footer class="text-center py-4 text-muted ">
                &copy;Copy Right : By Time Technology 2024
               </footer>
          </div>

          
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script>
      var coll = document.getElementsByClassName("collapsible");
      var i;

      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
</script>
<script>
   var btn = document.getElementById("mesBtn");
   var content =  document.getElementById("msgBox");
   btn.onclick = function(){
      content.style.display = "none";
   }
</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://kit.fontawesome.com/6a0af4d0b4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> 
  </body>
</html>
               
 