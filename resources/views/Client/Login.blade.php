<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Alpha Distribution</title>
  </head>
   <style>
     .container{
        max-width: 1000vh;
     }
     .cus-card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 10px;
     }
     .cus-input{
      border-top:none ;
      border-left: none;
      border-right: none;
     }
     

   </style>
  <body>

     <div class="container ">
        <div class="content mt-5 ">
            <div class="container-fluid">
              <div class="row ">
                 <div class="col-lg-3">

                 </div>
                 <div class="col-lg-9 mt-2  ">
                    <div class="row">
                        <div class="col-lg-8 p-3">
                            <div class="container-fluid">
                              <h4 class="text-center"><img src="../../dist/img/images.png" alt="" style="width:70px;"></h4>
                              @if(Session::has('message'))
                                <p class="text-danger text-center">{{Session::get('message')}}</p>
                              @endif
                                <div class="card mt-5 cus-card">
                                    <div class="form-group p-3">
                                        <form action="/client/login" class="cus-form" method="POST">
                                          @csrf
                                          <div class="mb-3">
                                             <label for="email" class="fw-bold mb-2">Email</label>
                                             <input type="text" id="email" name="email" class="form-control rounded-3 cus-input" required>
                                          </div>
                                          <div class="mb-3">
                                             <label for="password" class="fw-bold mb-2">Password</label>
                                             <input type="password" id="password" name="password" class="form-control rounded-3 cus-input" required>
                                          </div>
                                          <div class="mb-3  d-flex flex-row-reverse">
                                             <button class="btn btn-primary " type="submit" style="width: 150px;">Login</button>
                                             <div class="box" style="width: 300px;"></div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
        </div>
     </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>