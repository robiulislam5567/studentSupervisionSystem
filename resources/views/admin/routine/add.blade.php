@extends('layouts.admin')
@section('title', 'Add Routine')
@section('content')
<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/routine')}}" method="post">
        @csrf
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Add Routine Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/routine')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Routines</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              @if(Session::has('success'))
                  <script>
                      swal({ title: "Success!", text: "Counselling Routine Added Successfully.", timer:3000, icon: "success",});
                  </script>
                  @endif

                  @if(Session::has('error'))
                  <script>
                      swal({ title: "Opps!", text: "Registration failed.", timer:3000, icon: "warning",});
                  </script>
                  @endif

              <div class="panel-body">

                <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="name">
                          <option value="">Select Teacher Name</option>
                          @foreach ($teachers as $value)
                            <option value="{{$value->name}}">{{$value->name}}</option>
                          @endforeach
                      </select>

                      @if ($errors->has('name'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif

                    </div>
                </div>

                <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="email">
                          <option value="">Select Teacher email</option>
                          @foreach ($teachers as $value)
                            <option value="{{$value->email}}">{{$value->email}}</option>
                          @endforeach
                      </select>

                      @if ($errors->has('email'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif

                    </div>
                </div>

                <div class="form-group {{$errors->has('initial')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Initial</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="initial">
                          <option value="">Select Teacher Initial</option>
                          @foreach ($teachers as $value)
                            <option value="{{$value->initial}}">{{$value->initial}}</option>
                          @endforeach
                      </select>

                      @if ($errors->has('initial'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('initial') }}</strong>
                        </span>
                      @endif

                    </div>
                </div>

                    <div class="form-group {{$errors->has('day')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Day</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="day">
                              <option value="">Select Counselling Day</option>
                              @foreach ($day as $value)
                                <option value="{{$value->name}}">{{$value->name}}</option>
                              @endforeach
                          </select>

                          @if ($errors->has('day'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('day') }}</strong>
                            </span>
                          @endif

                        </div>
                    </div>

                    <div class="form-group {{$errors->has('time')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Time</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="time">
                              <option value="">Select Counselling Time</option>
                              @foreach ($time as $value)
                                <option value="{{$value->name}}">{{$value->name}}</option>
                              @endforeach
                          </select>

                          @if ($errors->has('time'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('time') }}</strong>
                            </span>
                          @endif

                        </div>
                    </div>

              </div>

              <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
