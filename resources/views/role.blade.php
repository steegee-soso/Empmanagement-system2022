@extends('layout.master')
@section('content')

<div class="container">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">View Roles</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Add Role</h5>
                <hr/>
                <br/>
                <form method="POST" action="{{url('admin/addRole')}}" class="frm-role">
                  <p>
                    <div class="form-group">

                      @if(Session::has('errormsg'))
                          <div class="alert alert-danger">{{session('errormsg')}}</div>
                      @endif

                      @if(Session::has('success'))
                          <div class='alert alert-success'>{{session('success')}}</div>
                      @endif

                      @if($errors->all())
                            <div class="alert alert-danger">
                              @foreach ($errors->all() as $error )
                                    <li class=''>{{$error}}</li>
                              @endforeach
                            </div>
                          @endif

                      {{-- <label for="formGroupExampleInput2">Name</label> --}}
                      <input type="text" name="role" required="required" class="form-control form-control-lg" id="" placeholder="Enter Role ">
                    </div>
                       </p>
                            <p>
                                <div class="form-group">
                                  {{-- <label for="formGroupExampleInput2">Role</label> --}}
                                   <select required="required" name="status" class="form-control form-control-lg">
                                       <option value="">Select-Status</option>
                                       <option value="active">active</option>
                                       <option value="inactive">inactive</option>
                                   </select>
                                </div>
                           </p>
                          <p>
                             <div class="form-group">
                                <input type="submit" name="save" class="btn btn-primary" value="Add Role">
                             </div>
                             @csrf
                          </p>
                  </form>
            </div>
          </div>

          <!--databale for roles !-->

          <div class="divider"></div>

          <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table-border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                      @if($data)
                         @foreach ($data as $record )
                                <tr>
                                  <td>{{$record->id}}</td>
                                  <td>{{$record->name}}</td>
                                  <td>{{$record->status}}</td>
                                  <td>{{$record->failed_at}}</td>
                                  <td><a href='#' class='btn btn-primary btn-xs'>edit</a>
                                  <a href='#' class='btn btn-danger btn-xs'>delete</a>
                                  </td>
                              </tr>
                         @endforeach
                      @endif
                    </tbody>
                </table>
            </div>
        </div>
          <!---end of datatables for role !-->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset('public')}}/js/datatables-simple-demo.js"></script>
@endsection()