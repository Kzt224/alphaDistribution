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
          <h3 class="mx-3 px-2">User Data</h3><br>
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
            <div class="row mx-2"><br>
                <div class="col-lg-6 mx-2 ">
                  <h6>Sale Data</h6>
                 <!-- small card -->
                  <div class="bg-info ">
                    <table class="table text-white" >
                    <tr>
                        <th>Id</th>
                        <th>Saleman No</th>
                        <th>Precent</th>
                        <th>Terget</th>
                        <th>Sale Ammount</th>

                    </tr>
                     @foreach($totalOrder as $key => $order)
                     <tr>
                        <td>{{$key}}</td>
                        <td>{{$order['user_name']}}</td>
                        <td>{{($order['total']/$terget)*100}}%</td>
                        <td>{{$terget}}</td>
                        <td>{{$order['total']}}</td>
                    </tr>
                     @endforeach
                    </table>
                  </div>
                </div>
                
            </div>      
  <!-- /.card -->
           </div>
           <div class="btn-group mx-2">
              <a href="/data" class="btn btn-secondary mx-3 ">Back</a>
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
