@extends('layouts.backend_layout.admin_template')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ __('View Payments') }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
          <li class="breadcrumb-item active"> {{ __('View Payments') }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
    @if (session()->has('succmessage'))
      <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a><h4 class="alert-heading">Success!</h4>
      {{ session('succmessage') }} </div>
    @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payment List</h3>
        
        </div>
        <!-- /.card-header --> 
        {!! Form::open(['method'=>'POST', 'url'=> route('admin.payment.deleteall'), 'id'=>'myForm']) !!}
          
        <div class="card-body"><a class="btn btn-primary btn-sm pull-left delete_all" style='float:right;color:white;' onclick="return deleteAllRecord();">Delete Selected </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><input type="checkbox" name="" id="masterchk" value=""></th>
              <th>Payment Date</th>
              <th>Package</th>
              <th>Destination</th>
              <th>Payment Method</th>
              <th>Payment Status</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @if(!empty(count($PaymentData)))
                @foreach($PaymentData as $data)
                  <tr>
                    <td><input type="checkbox" name="payment_id[]" class="sub_chk" value="{{$data->id}}"></td>
                    <td>
                      {{$data->payment_date}}  
                   
                    </td>
                    <td>  {{$data->package->v_name}}
                    </td>
                    <td>{{$data->getDestinationName()->v_name}}
                    </td>
                    <td>
                      {{$data->payment_method}}
                    </td>
                    <td>{{$data->payment_status}}
                      
                    </td>
                    <td>{{$data->created_at}}

                    </td>
                    <td>
                      <a href="#;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetailTraveller{{$data->id}}"  >Traveller Detail</a>
                      <!-- Modal Start -->

                      <div class="modal fade" id="myModalDetailTraveller{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Detail Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="rTable">
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller Name</div>
                                  <div class="rTableCell">{{$data->travellerData->name}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller Email</div>
                                  <div class="rTableCell">{{$data->travellerData->email}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller Phone</div>
                                  <div class="rTableCell">{{$data->travellerData->phone}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller Address</div>
                                  <div class="rTableCell">{{$data->travellerData->address}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller City</div>
                                  <div class="rTableCell">{{$data->travellerData->city}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller State</div>
                                  <div class="rTableCell">{{$data->travellerData->state}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Traveller Country</div>
                                  <div class="rTableCell">{{$data->travellerData->country}}</div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                      <!-- Modal End -->
                     <br>
                      <a href="#;"  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetail{{$data->id}}"    style='margin-top:6px;'>Package Detail</a>
                     
                      <div class="modal fade" id="myModalDetail{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Detail Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="rTable">
                                <div class="rTableRow">
                                  <div class="rTableHead">Package Name</div>
                                  <div class="rTableCell">{{$data->package->v_name}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Package Description</div>
                                  <div class="rTableCell">{!!$data->package->v_desc!!}</p></div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Package Location</div>
                                  <div class="rTableCell">{{$data->package->v_location}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Start Date</div>
                                  <div class="rTableCell">{{$data->package->tour_start_date}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">End Date</div>
                                  <div class="rTableCell">{{$data->package->tour_end_date}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Last Booking Date</div>
                                  <div class="rTableCell">{{$data->package->last_book_date}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Price (per person)</div>
                                  <div class="rTableCell">{{$data->package->v_price}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Itinerary</div>
                                  <div class="rTableCell">{!!$data->package->v_itinerary!!}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Policy</div>
                                  <div class="rTableCell">{!!$data->package->v_policy!!}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Terms and Conditions</div>
                                  <div class="rTableCell">{!!$data->package->v_terms!!}</div>
                                </div>
  
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <br>
                      <a href="#;" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#payment{{$data->id}}" style='margin-top:6px;'>Payment Detail</a>
                      <div class="modal fade" id="payment{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Detail Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="rTable">
                                <div class="rTableRow">
                                  <div class="rTableHead">Invoice No</div>
                                  <div class="rTableCell">{{$data->invoice_number}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Payment Date</div>
                                  <div class="rTableCell">{{$data->payment_date}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Transaction Id</div>
                                  <div class="rTableCell">{{$data->transaction_id}}</div>
                                </div>
                                <div class="rTableRow">
                                  <div class="rTableHead">Paid Amount (in USD)</div>
                                  <div class="rTableCell">{{$data->v_price}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Total Person</div>
                                  <div class="rTableCell">{{$data->total_person}}</div>
                                </div>
                                @if($data->payment_method=='Stripe')
                                <div class="rTableRow">
                                  <div class="rTableHead">Card Number</div>
                                  <div class="rTableCell">{{$data->card_number}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Card CVV</div>
                                  <div class="rTableCell">{{$data->cvv}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Card Expire Month</div>
                                  <div class="rTableCell">{{$data->exp_month}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Card Expire Year</div>
                                  <div class="rTableCell">{{$data->exp_year}}</div>
                                </div>
                                @endif
                                @if($data->payment_method=='Bank Deposit')
                                <div class="rTableRow">
                                  <div class="rTableHead">Bank Transaction Information</div>
                                  <div class="rTableCell">{{$data->tran_info}}</div>
                                </div>                              
                                @endif
                                <div class="rTableRow">
                                  <div class="rTableHead">Payment Method</div>
                                  <div class="rTableCell">{{$data->payment_method}}</div>
                                </div>
  
                                <div class="rTableRow">
                                  <div class="rTableHead">Payment Status</div>
                                  <div class="rTableCell">{{$data->payment_status}}</div>
                                </div>
  
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                     <br> <a href="#;" class="btn btn-danger btn-sm" onclick="deleteRecord('{{route('admin.payment.paymentdelete',$data->id)}}')" style='margin-top:6px;'>Delete</a>
                    
                  </tr>
                @endforeach
              @else
					      <tr >
					      <td class="center" colspan=8 style='text-align:center;'>No Record Found</td></tr>
				      @endif
           
            </tbody>
            <tfoot>
              <tr>
                <th></th>
                <th>Payment Date</th>
                <th>Package</th>
                <th>Destination</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {!! Form::close() !!}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@endsection
@push('css')
<style>
  .rTableCell,.rTableHead{display:table-cell;padding:3px 10px;border:1px solid #999}.modal-header{border-bottom-color:#f4f4f4}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-body{position:relative;padding:15px}.rTable{display:table;width:100%;border:1px solid #999}.rTableRow{display:table-row}.rTableHead{width:30%}
</style>
@endpush
@push('js')
<script src="{{ asset('js/backend_js/jquery-validation/alter.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
    'order': [],
    'columnDefs': [ {
    'targets': [0,7], /* column index */
    'orderable': false, /* true or false */
    }]
    });
  });

</script>
@endpush