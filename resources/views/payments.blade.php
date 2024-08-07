@extends('layouts.app')
@section('content')

<section class="content">
    <br>
    <div class="container rounded  mt-5">
        <div class="">
            <div class="card">
              <div class="card-header" style="background-color: #ea7831;"> 
                <h3 class="card-title" style="color: #ffffff;">Payments</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Payment No</th>
                      <th>Date</th>
                      <th>Discription</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th style="width: 40px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>231546</td>
                      <td>2024-05-04</td>
                      <td>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                      </td>
                      <td>$50</td>
                      <td>paid</td>
                      <td>Download</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
    </div>
</section>


@endsection