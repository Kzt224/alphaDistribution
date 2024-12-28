
@extends('./Client.Template.Layout')

@section('content')
           
                 <div class="content overflow-auto">
                 <div class="container-fluid mt-3 p-4">
                    <div class="row mb-3">
                      <div class="col">
                        @if ($errors->any())
                          <div class="alert alert-info">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
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
                        <!-- <div class="alert alert-info">
                          <i class="fa fa-download me-2"></i>A New version released.
                          <a href="">Download</a>
                        </div>
                      </div> -->
                    </div>
                    <div class="row flex-column flex-lg-row">
                      <h2 class="h6 text-white-50 sticky-top">All Product</h2>
                       @foreach($products as $key => $product)
                       <div class="col-lg-6">
                            <div class="card mb-3">
                              <div class="card-body">
                               <table class="table">
                                 <thead>
                                    <tr>
                                      <th class="h6">id</th>
                                      <th class="h6"> Name</th>
                                      <th class="h6">Image</th>
                                      <th class="h6">Price</th>
                                      <th class="h6">Qty</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>{{$key+1}}</td>
                                     <td>{{$product->name}}</td>
                                     <td><img src="{{url('/images/'.$product->image_name)}}" alt="{{$product->image_name}}" style="width:50px;height:50px;border-radius: 50%"></td>
                                     <td>{{$product->price}}</td>
                                     <td>
                                        <form action="/client/order" method="POST">
                                  
                                          @csrf 
                                          <input type="hidden" value="{{$product->id}}" name="product_id">
                                          <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                          <input type="hidden" value="{{$product->price}}" name="price">
                                          <input type="hidden" value="{{$outlet}}" name="outlet_id">
                                         <input type="number" style="width: 50px;
                                                           outline: none;"
                                                            min="0" max="{{$product->qty}}"
                                                            name="qty">
                                     </td>
                                     
                                   </tr>
                                 </tbody>
                               </table>
                                <div class="d-flex flex-row g-2" style="align-content: center;">
                                  <p class="d-flex text-muted">Instock : {{$product->qty}}pcs</p>
                                <button type="submit" style="border: none;background: white;" class="cart d-flex">
                                                <i class="fa fa-cart-shopping text-primary" style="font-size: 22px;font-weight:700px;">
                                                <span style="font-size: 10px;color: black;">Add To Cart</span>
                                                </i>
                                            </button>
                                            </form>
                                </div>
                              </div>
                          </div>
                    </div>
                       @endforeach
                  </div>
                 </div>
             
@endSection
 