<table class="table table-bordered table-hover" id="datatables">
       <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Product_name</th>
                <th scope="col">Outlet_name</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $key =>  $order)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$order->product_name}}</td>
                <td>{{$order->outlet->name}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->qty}}</td>
                <td>{{$order->total}}</td>
                <td>
                   <div class="form-row">
                      <a href="/" class="btn btn-warning" type="button" style="height: 40px;margin-right: 10px" >Edit</a>
                   </div>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>



      <table class="table table-bordered table-hover" id="">
       <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Outlet_name</th>
                <th scope="col">Total</th>
                <th scope="col">Ation</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $key =>  $order)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$order->outlet}}</td>
                <td>{{$order->total}}</td>
                <td>
                   <div class="form-row">
                      <a href="/order/{{$order->id}}" class="btn btn-warning" type="button" style="height: 40px;margin-right: 10px" >Edit</a>
                   </div>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>


      <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
         </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
      </div>
              <!-- /.row -->







<a href="" class="text-decoration-none">
                            <div class="card mb-3">
                              <div class="card-body">
                               <table class="table">
                                 <thead>
                                    <tr>
                                      <th class="h6">id</th>
                                      <th class="h6">Outlet Name</th>
                                      <th class="h6">Address</th>
                                      <th class="h6">Product_name</th>
                                      <th class="h6">Price</th>
                                      <th class="h6">Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>{{$key+1}}</td>
                                     <td>{{$order->outlet->name}}</td>
                                     <td>{{$order->outlet->city->name}}</td>
                                     <td>{{$order->product_name}}</td>
                                     <td>{{$order->price}}</td>
                                     <th>{{$order->total}}</th>
                                   </tr>
                                 </tbody>
                               </table>
                              </div>
                          </div>
                          </a>





              