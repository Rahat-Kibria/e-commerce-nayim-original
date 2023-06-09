@extends('admin.admin_master')
@section('title')
Order -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Order ListS</h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Payment Type</th>
                <th class="wd-15p">Transaction Id</th>
                <th class="wd-15p">Sub Total</th>
                <th class="wd-15p">Shipping</th>
                <th class="wd-15p">Total</th>
                <th class="wd-15p">Date</th>
                <th class="wd-15p">Status</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($order as $key=>$orders )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$orders->payment_type}}</td>
                <td>{{$orders->blnc_transection}}</td>
                <td>{{$orders->subtotal}}</td>
                <td>{{$orders->shipping}}</td>
                <td>{{$orders->total}}</td>
                <td>{{$orders->date}}</td>
                <td>
                    @if ($orders->status==0)
                   <span class="badge badge-warning">Pending</span>
                   @elseif ($orders->status==1)
                    <span class="badge badge-success">Accept</span>
                    @elseif ($orders->status==2)
                    <span class="badge badge-info">Pogress</span>
                    @elseif ($orders->status==3)
                    <span class="badge badge-success">Delivered</span>
                    @else
                    <span class="badge badge-danger">Cancel</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('order.view',['id'=>$orders->id]) }}" class="btn btn-sm btn-info rounded"><i class="fa fa-eye"></i></a>

                </td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div><!-- sl-pagebody -->

   

  </div><!-- sl-mainpanel -->









@endsection
