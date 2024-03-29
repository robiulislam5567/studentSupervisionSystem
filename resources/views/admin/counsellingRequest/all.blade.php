@extends('layouts.admin')
@section('title','All Request')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">

            <div class="row">
              <div class="col-md-8">
                <h3 class="panel-title"><i class="fa fa-cubes"></i> All Request Information</h3>
              </div>
              <div class="col-md-4 text-right">
                <!-- <a href="{{url('admin/user/create')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> User Registration</a> -->
              </div>
              <div class="clearfix">
            </div>
            </div>
          </div>

              @if(Session::has('success'))
              <script>
                  swal({ title: "Success!", text: "Request approved Successfully.", timer:3000, icon: "success",});
              </script>
              @endif

              @if(Session::has('error'))
              <script>
                  swal({ title: "Opps!", text: "Registration failed.", timer:3000, icon: "warning",});
              </script>
              @endif

          <div class="panel-body">
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Day</th>
                                  <th>Time</th>
                                  <th>Status</th>
                                  <th>Accept/Deny</th>
                              </tr>
                          </thead>


                          <tbody>

                            @foreach ($request as $value)
                              <tr>
                                  <td>{{$value->sName}}</td>
                                  <td>{{$value->sEmail}}</td>
                                  <td>{{$value->day}}</td>
                                  <td>{{$value->time}}</td>
                                  <td>
                                    @if($value->status==true)
                                      <span class="badge bg-primary">Approved</span>
                                    @else
                                      <span class="badge bg-danger">Pending</span>
                                    @endif
                                  </td>
                                  <td>
                                    <button class="approve" data-approve="{{ url('admin/counselling/request/approve/'.$value->id) }}" data-toggle="modal" data-target="#exampleModalApprove">@if($value->status==true)
                                      <i class="fa fa-close fa-lg"></i> @else <i class="fa fa-check fa-lg"></i> @endif</button>

                                    <!-- <a href="#"><i class="fa fa-plus-square fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-pencil-square fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-trash fa-lg"></i></a> -->
                                  </td>
                              </tr>
                            @endforeach

                          </tbody>
                      </table>

                  </div>
              </div>
          </div>



      </div>
  </div>
</div>

<!-- Modal for approve -->
<div class="modal fade" id="exampleModalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="approve">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">User Request</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p class="text-danger">Are you sure?</p></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
