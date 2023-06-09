@extends('admin.admin_master')
@section('title')
User Role -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">


      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Sub Admin Lists
            <a href="{{ route('user.create') }}"class='btn btn-sm btn-primary rounded' style="float: right">Add</a>
        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Name</th>
                <th class="wd-20p">Phone</th>
                <th class="wd-20p">Access</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($user as $key=>$users )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->phone }}</td>
                <td>
                   @if ($users->category==1)
                   <span class="badge badge-success">category</span>
                   @else
                   @endif

                   @if ($users->cupon==1)
                   <span class="badge badge-info">cupon</span>
                   @else
                   @endif

                   @if ($users->product==1)
                   <span class="badge badge-warning">product</span>
                   @else
                   @endif

                   @if ($users->blog==1)
                   <span class="badge badge-primary">blog</span>
                   @else
                   @endif

                   @if ($users->order==1)
                   <span class="badge badge-danger">order</span>
                   @else
                   @endif

                   @if ($users->report==1)
                   <span class="badge badge-success">report</span>
                   @else
                   @endif

                   @if ($users->role==1)
                   <span class="badge badge-info">user_role</span>
                   @else
                   @endif

                   @if ($users->return==1)
                   <span class="badge badge-success">return</span>
                   @else
                   @endif

                   @if ($users->contact==1)
                   <span class="badge badge-danger">contact</span>
                   @else
                   @endif

                   @if ($users->comment==1)
                   <span class="badge badge-success">comment</span>
                   @else
                   @endif

                   @if ($users->stock==1)
                   <span class="badge badge-success">stock</span>
                   @else
                   @endif

                   @if ($users->setiing==1)
                   <span class="badge badge-success">setting</span>
                   @else
                   @endif

                   @if ($users->other==1)
                   <span class="badge badge-warning">other</span>
                   @else
                   @endif

                </td>
                <td>
                    <a href="{{ route('user.edit',['id'=>$users->id]) }}" class="btn btn-sm btn-info rounded"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.delete',['id'=>$users->id]) }}" class="btn btn-sm btn-danger rounded" id="delete"><i class="fa fa-trash"></i></a>
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
