
@extends('./Client.Template.Layout')

@section('content')
           
                 <div class="content overflow-auto">
                 <div class="container-fluid mt-3 p-4">
                    <div class="row mb-3 ">
                      <div class="col">
                       @if (session('warning'))
                        <div class="alert alert-warning" style="display: flex;justify-content: space-between;" id="msgBox">
                            <div class="d-flex flex-column">
                              {{ session('warning') }}
                            </div>
                              <div class="d-flex" id="mesBtn">
                              <i class="fa fa-xmark"></i>
                            </div>
                          </div>
                        @endif

                        @if (session('message'))
                        <div class="alert alert-success" style="display: flex;justify-content: space-between;" id="msgBox">
                            <div class="d-flex flex-column">
                              {{ session('message') }}
                            </div>
                              <div class="d-flex" id="mesBtn">
                              <i class="fa fa-xmark"></i>
                            </div>
                          </div>
                        @endif

                      </div>
                    </div>
                    <h2 class="h6 text-white-50">Order Listing</h2>
                    <div class="row flex-column flex-lg-row ">
                      <?php 
                        $id=1;
                      ?>
                      @foreach($groupedOrdersWithTotal as $outlet_id => $data)
                        <div class="col-lg-6">
                         <div class="card mb-3">
                              <div class="card-body">
                                 <div  class="collapsible">
                                  <div class="d-flex  justify-content-between">
                                     <div class="h5">Id</div>
                                     <div class="h5">Outlet Name</div>
                                     <div class="h5">Address</div>
                                     <div class="h5">Total</div>
                                  </div>
                                  <div class="d-flex justify-content-between bg-light">
                                     <div>{{$id}}</div>
                                     <div>{{$data['orders']->first()->outlet->name}}</div>
                                     <div>{{$data['orders']->first()->outlet->city->name}}</div>
                                     <div>{{$data['total']}}</div>
                                  </div>
                                 </div>
                                <div class="collpeContent mb-2">
                                  <table class="table">
                                  <thead>
                                      <tr>
                                        <th>id</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($data['orders'] as $key => $product)

                                     
                                    <tr class="bg-secondary">
                                      <td>{{$key+1}}</td>
                                      <td>{{$product->product->name}}</td>
                                      <td>{{$product->price}}</td>
                                      <td>{{$product->qty}}</td>
                                      <td>{{$product->total}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              </div>
                          </div>
                        </div>
                        <?php 
                         $id++;
                        ?>
                      @endforeach
                  </div>
                 </div>
             
@endSection



 