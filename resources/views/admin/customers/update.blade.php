@extends('admin.layouts.app')
@section('title', 'Customers')
@section('page_css')
    <!-- Datatables -->
    <link href="{{ asset('admin/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        .addBtn{
            float: right;
            /*margin-top: 10px;*/
        }
        td{
            text-align: center;
        }
    </style>

@endsection
@section('section')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vendors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Vendors</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-block">
            
                <strong>{{ $error }}</strong>
            
        </div>
        @endforeach
        @endif

        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="jumbotron bg-white">
                            <h3>Update Customer</h3>
                            <br>
                            <div class="container">
                                <form method="post" action="{{route('customers.update')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" required name="id" value="{{$customer->id}}">
                                      
                                        <h5>First Name</h5>
                                        <input type="text" class="form-control" required name="first_name" value="{{$customer->first_name}}" placeholder="Enter First Name">
                                      </div>
                                      <div class="form-group">
                                        <h5>Last Name</h5>
                                        <input type="text" class="form-control" required name="last_name" value="{{$customer->last_name}}" placeholder="Enter Last Name">
                                      </div>
                                      <div class="form-group">
                                        <h5>Email</h5>
                                        <input type="email" class="form-control" required name="email" value="{{$customer->email}}" placeholder="Enter Email">
                                      </div>
                                      <div class="form-group">
                                        <h5>Phone Number</h5>
                                        <input type="number" class="form-control" required name="phone" value="{{$customer->phone_no}}" placeholder="Enter Phone">
                                      </div>
                                      <div class="form-group">
                                        <h5>City</h5>
                                        <input type="text" class="form-control" required name="city" value="{{$customer->city}}" placeholder="Enter City">
                                      </div>
                                      <div class="form-group">
                                        <h5>State</h5>
                                        <input type="text" class="form-control" required name="state" value="{{$customer->state}}" placeholder="Enter State">
                                      </div>
                                      <div class="form-group">
                                        <h5>Country</h5>
                                        <input type="text" class="form-control" required name="country" value="{{$customer->country}}" placeholder="Enter Country">
                                      </div>
                                      <div class="form-group">
                                        <h5>Address</h5> 
                                        <input type="text" class="form-control" required name="address" value="{{$customer->address}}" placeholder="Enter Address">
                                      </div>
                                      
                                      <button type="submit" class="btn btn-primary">Update Customer</button>
                          </div>
                
            
                        </form>
                   
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"  style="background-color: #343a40;
            color: #fff;">
                        <h2 class="modal-title">Confirmation</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin: 0;">Are you sure you want to delete this ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="ok_delete" name="ok_delete" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="jumbotron bg-white">
                <h3>Add Customer</h3>
                <br>
                <div class="container">
                    <form method="POST" action="{{route('customers.store')}}">
                        @csrf
                        <div class="form-group">
                            <h5>First Name</h5>
                            <input type="text" class="form-control" required name="first_name" placeholder="Enter First Name">
                          </div>
                          <div class="form-group">
                            <h5>Last Name</h5>
                            <input type="text" class="form-control" required name="last_name" placeholder="Enter Last Name">
                          </div>
                          <div class="form-group">
                            <h5>Email</h5>
                            <input type="email" class="form-control" required name="email" placeholder="Enter Email">
                          </div>
                          <div class="form-group">
                            <h5>Phone Number</h5>
                            <input type="number" class="form-control" required name="phone" placeholder="Enter Phone">
                          </div>
                          <div class="form-group">
                            <h5>City</h5>
                            <input type="text" class="form-control" required name="city" placeholder="Enter City">
                          </div>
                          <div class="form-group">
                            <h5>State</h5>
                            <input type="text" class="form-control" required name="state" placeholder="Enter State">
                          </div>
                          <div class="form-group">
                            <h5>Country</h5>
                            <input type="text" class="form-control" required name="country" placeholder="Enter Country">
                          </div>
                          <div class="form-group">
                            <h5>Address</h5> 
                            <input type="text" class="form-control" required name="address" placeholder="Enter Address">
                          </div>
                          
                    
              </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Customer</button>
                
            </form>
              </div>
        </div>
        </div>
      
    </div>
@endsection
@section('script')
<script src="{{asset('admin/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('admin/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>


    <script>
        $(document).ready(function () {
            var DataTable = $("#example1").DataTable({
                dom: "Blfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: `{{route('customers.index')}}`,
                },
                columns: [

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    // {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'First Name'},
                    {data: 'last_name', name: 'Last Name'},
                    {data: 'email', name: 'Email'},
                    {data: 'phone_no', name: 'Phone No'},
                    {data: 'city', name: 'City'},
                    {data: 'state', name: 'State'},
                    {data: 'country', name: 'Country'},
                    {data: 'address', name: 'Address'},
                    


                    {data: 'action', name: 'action', orderable: false}
                ]

            });
            var delete_id;
            $(document,this).on('click','.delete',function(){
                delete_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });
            $(document).on('click','#ok_delete',function(){
                $.ajax({
                    url:`{{url('admin/customers/destroy')}}/${delete_id}`,
                    type:'post',
                    data:{
                        id:delete_id,
                        "_method": 'DELETE',
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#ok_delete').text('Deleting...');
                        $('#ok_delete').attr("disabled",true);
                    },
                    success: function (data) {
                        DataTable.ajax.reload();
                        $('#ok_delete').text('Delete');
                        $('#ok_delete').attr("disabled",false);
                        $('#confirmModal').modal('hide');
                        //   js_success(data);
                        if(data==0) {
                            toastr.error('Exception Here ! Delete Firstly Child Category');
                        }else{
                            toastr.success('Record Delete Successfully');
                        }



                    }
                })
            });
        })
    </script>


@endsection
