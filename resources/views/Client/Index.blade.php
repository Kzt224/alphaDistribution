
@extends('./Client.Template.Layout')

@section('content')
           
                 <div class="content overflow-auto">
                 <div class="container-fluid mt-3 p-4">
                    <div class="row mb-3">
                      <div class="col">
                        <!-- <div class="alert alert-info">
                          <i class="fa fa-download me-2"></i>A New version released.
                          <a href="">Download</a>
                        </div> -->
                      </div>
                    </div>
                    <h2 class="h6 text-white-50">Outlet</h2>
                    <div class="row flex-column flex-lg-row">
                       @foreach($outlets as $key => $outlet)
                       <div class="col-lg-6">
                          <a href="/client/{{$outlet->id}}/product" class="text-decoration-none">
                            <div class="card mb-3">
                              <div class="card-body">
                               <table class="table">
                                 <thead>
                                    <tr>
                                      <th>id</th>
                                      <th>Outlet Name</th>
                                      <th>Address</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>{{$key+1}}</td>
                                     <td>{{$outlet->name}}</td>
                                     <td>{{$outlet->city->name}}</td>
                                   </tr>
                                 </tbody>
                               </table>
                              </div>
                          </div>
                          </a>
                    </div>
                       @endforeach
                  </div>
                 </div>
             
@endSection
 