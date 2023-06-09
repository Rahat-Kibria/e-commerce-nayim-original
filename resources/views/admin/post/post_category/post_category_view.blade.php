@extends('admin.admin_master')
@section('title')
Post Category -Page
@endsection

@section('content')

 <div class="sl-mainpanel">
    <div class="sl-pagebody">
   
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Category Lists
            <a href=""class='btn btn-sm btn-primary rounded' style="float: right"data-toggle="modal" data-target="#modaldemo3">Add PostCategory</a>
        </h6>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Post Category English</th>
                <th class="wd-15p">Post Category Bangla</th>
                <th class="wd-20p">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($postcategory as $key=>$postcategories )
              <tr>
                <td>{{$key+1}}</td>
                <td>{{ $postcategories->post_category_eng }}</td>
                <td>{{ $postcategories->post_category_bang }}</td>
                <td>
                    <a href="{{ route('postcategory.edit',['id'=>$postcategories->id]) }}" class="btn btn-sm btn-info rounded"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('postcategory.delete',['id'=>$postcategories->id]) }}" class="btn btn-sm btn-danger rounded" id="delete"><i class="fa fa-trash"></i></a>
                </td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div><!-- sl-pagebody -->

  </div><!-- sl-mainpanel -->







   {{-- add modal --}}
   <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Post Category Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('postcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body pd-20">
            <div class="form-group">
              <label for="">Post Category  English</label>
              <input type="text" name="post_category_eng" id="" class="form-control" placeholder="Post category English">
            @error('post_category_eng')
                <div class="alert text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="">Post Category Bangla</label>
                <input type="text" name="post_category_bang" id="" class="form-control" placeholder="Post category Bangla">
              @error('post_category_bang')
                  <div class="alert text-danger">{{ $message }}</div>
              @enderror
              </div>
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
    </form>

      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


@endsection
