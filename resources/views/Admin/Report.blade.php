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
          <h3 class="mx-2">Daily Report</h3><br>
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
            <form action="/report/detail" method="post" class="mx-2">
                @csrf
               <input type="datetime-local" name="date" style="border-radius:5px;">
                 <button type="submit" style="border:none;border-radius:5px;">Generate</button>
            </form>
           <div><br>
               @if(isset($productTotal))
               <div class="row">
                 <div class="col-lg-8 mx-2">
                    <div class="card" id="dailyreport">
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
                        <div class="row invoice-info">
                         <div class="col-sm-4 invoice-col">
                          <small><b>Date</b> : {{$format}}  <br>
                          </small>
                        </div>
                        <!-- /.col -->
                      </div>
                         <hr class="bg-white">
                         <div class="row">
                <div class="col-12">
                  <table class="table  table-bordered table-hover ">
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
                      <?php
                        $id = 0;
                       ?>
                      @foreach($productTotal as $key => $product)
                      <tr>
                        <td>{{$id+1}}</td>
                        <td>{{ $product['product_name']}}</td>
                        <td>{{$product['total_qty']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['total_price']}}</td>
                    </tr>
                    <?php 
                      $id++;
                    ?>
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
                        <td>
                            <strong>Total</strong>
                        </td>
                        <td>
                          {{$grandTotal}}
                        </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              @else
                <div class="alert alert-warning">No Data Avaliable</div>
               @endif
               
              <!-- /.--->
                      </div>
                    <!-- /.card-body -->
                    <div class="option mx-2" id="hideGp">
                      <a href="/report" type="btn" class="btn btn-primary">Back</a>
                      @if(isset($productTotal))
                        <button type="submit" class="btn btn-warning" style="height: 38px;" id="repBtn" >
                          <i class="fa fa-print" font-size="50px;"></i>
                        </button>    
                        @endif
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
