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
          <h3>Today Ordered Outlet Table</h3><br>
           <div><br>
           <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-hover" id="datatables">
       <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Outlet Name</th>
                <th scope="col">Outlet Address</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $id = 1;
            ?>
            @foreach($groupedOrdersWithTotal as $outlet_id => $data)
              <tr>
                <th scope="row">{{$id}}</th>
                <td>{{$data['orders']->first()->outlet->name}}</td>
                <td>{{$data['orders']->first()->outlet->city->name}}</td>
                <td>{{$data['total']}}</td>
                <td>
                   <div class="form-row">
                      <a href="/order/{{$outlet_id}}/detail" class="btn btn-warning" type="button">View</a>
                   </div>
                </td>
              </tr>
             <?php 
              $id++;
             ?>
            @endforeach
            </tbody>
      </table>
    </div>
    <!-- /.card-body -->
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
