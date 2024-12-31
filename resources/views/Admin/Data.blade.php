@extends("./Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
         </div>
          <div style="height: 60px">
           @if(Session::has('message'))
             <div class="alert mt-2">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  {{ Session::get('message') }}
              </div>
          @endif
          </div>
          <h3 class="mx-3 px-2">Data && Manangement</h3><br>
               @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" style="display: flex;justify-content: space-between;" id="msgBox">
                      <div class="d-flex flex-column">
                              {{$error}}
                      </div>
                      <div class="d-flex" id="mesBtn">
                                <i class="fa fa-xmark"></i>
                      </div>
                  </div>
                   @endforeach
                @endif
           <div><br>
            <div class="row mx-2">
                <div class="col-lg-3 mx-2 ">
                <!-- small card -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3>User</h3>

                        <p> Data</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="/data/user" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
            </div>
                <div class="col-lg-3  mx-2">
                   <!-- small card -->
                   <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Product</h3>

                        <p> Manangement</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <a href="/product" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3  mx-2">
                   <!-- small card -->
                   <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>User</h3>

                        <p>Management</p>
                    </div>
                    <div class="icon">
                      <i class="fa-solid fa-users-gear"></i>
                    </div>
                    <a href="/user" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
            </div>      
  <!-- /.card -->
           </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <br><br><br><br>
  <!-- /.content-wrapper -->
@endSection
<script src="../dist/js/pages/dashboard2.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>

<script>
  $(function () {
    $('#datatables').DataTable({
      "pageLength": 3,
      "responsive": true,
    });
  });
</script>
