@extends("./Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper mb-3">
 <div>
  <div>
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
           <div><br>
               <div class="row">
                 <div class="col-lg-8 mx-2">
                    <div class="card">
                    <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-6">
                              <h6>
                                <i class="fas fa-globe"></i> Alpha Distribution, Inc. <br>
                                  Address: Min Khaung Kyaung Street.Gyobingauk.
                              </h6>
                          </div>
                        </div><br>
                          <!-- info row -->
                          <div class="row invoice-info ">
                            <div class="col col-md-8">
                              <small><b>Customer</b> : {{$datas['name']}}  <br>
                                <b>Address</b>  : {{$datas['address']}} <br>
                                <b>Ph-No</b>    : {{$datas['ph']}} <br>
                              </small>
                            </div>
                            <div class=" p-5 d-md-none">
                            </div>
                            <!-- /.col --> 
                            <div class="col col-md-4">
                              <small><b>Order Id</b> : {{$datas['order_id']}}  <br>
                                <b>Order Date</b>  : {{$datas['date']}}  <br>
                                <b>Invoice Date</b> :  {{$datas['date']}}   <br>
                                <b>Term </b>    : Cash <br>
                                </small>
                            </div>
                          </div>
              <!-- /.row -->
                        <!-- /.col -->
                      </div>
                         <hr class="bg-white">
                         <div class="row">
                <div class="col-12">
                  <div class="container-fluid">
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Ammount</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($orders as $key => $order)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->total}}</td>
                      </tr>
                      @endforeach
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                              <strong>Total</strong>
                          </td>
                          <td>{{$datas['total']}}</td>
                      </tr>
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                  <!-- end container-fluid -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.--->
                      </div>
                    <!-- /.card-body -->
                    <div class="option mx-2">
                      <a href="/order" type="btn" class="btn btn-primary">Back</a>
                      <a href="/print" style="border: none;height:38px;width: 50px;" type="btn" class="btn btn-warning"><i class="fa fa-print" font-size="50px;"></i></a>
                    </div>
                   </div>
                 </div>
               </div>
  <!-- /.card -->
        
           </div>
        <!-- /.row -->
        
      </div><!--/. container-fluid -->

    </section>
    <!-- /.content -->
  </div><br><br><br>
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
