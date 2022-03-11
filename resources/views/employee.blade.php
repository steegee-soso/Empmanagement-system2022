@extends('layout.master')
@section('content')

<div class="container">
    <div class="col-md-10">
        {{-- <div class="card">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
            </div> --}}
            <div class="card-body">
              <h5 class="card-title">Add Employee</h5>
                <hr/>
                <br/>
    
                <form method="POST" class="frm_employee">

                  <p>
                    <div class="form-group">
                      {{-- <label for="formGroupExampleInput2">Name</label> --}}
                      <input type="name" required="required" class="form-control form-control-lg" id="" placeholder="Enter Full name ">
                    </div>
                    </p>

                    <div class="form-group">
                      {{-- <label for="formGroupExampleInput">Phone number</label> --}}
                      <input type="text" class="form-control form-control-lg" id="" placeholder="Enter phone number">
                    </div>

                    <p>
                    <div class="form-group">
                      {{-- <label for="formGroupExampleInput2">Email</label> --}}
                      <input type="email" required="required" class="form-control form-control-lg" id="" placeholder="Enter Email ">
                    </div>
                    </p>

                      <p>
                        <div class="form-group">
                          {{-- <label for="formGroupExampleInput2">Job Role</label> --}}
                          <input type="job_role" class="form-control form-control-lg" id="" placeholder="Enter Job role ">
                        </div>
                        </p>

                          <p>
                            <div class="form-group">
                              {{-- <label for="formGroupExampleInput2">Job Description</label> --}}
                              <input type="job_description" class="form-control form-control-lg" id="" placeholder="Enter Job Description ">
                            </div>
                            </p>
                            
                            <p>
                                <div class="form-group">
                                   <select required="required" name="role" class="form-control form-control-lg">
                                       <option value="">Select-Role</option>
                                       @if($role)
                                          @foreach ($role as  $roles )
                                            <option value={{$roles->id}}>{{$roles->name}}</option>
                                          @endforeach
                                       @endif
                                   </select>
                                </div>
                           </p>

                           <p>
                            <div class="form-group">
                              {{-- <label for="formGroupExampleInput2">Department</label> --}}
                               <select required="required" name="department" class="form-control form-control-lg">
                                   <option value="">Select-Department</option>

                                   @if($role)
                                      @foreach ($department as  $departments)
                                           <option value={{$departments->id}}>{{$departments->name}}</option>
                                      @endforeach
                                   @endif

                               </select>
                            </div>
                          </p>

                          <p>
                            <div class="form-group">
                              {{-- <label for="formGroupExampleInput2">Job Description</label> --}}
                              <input type="file"  required="required" class="form-control form-control-lg" id="" placeholder="">
                            </div>
                            </p>

                            <div class="main_container">

                            <div class="row">
                              <div class="col-md-5">
                                <input type="text" name="description" class="form-control form-control-lg"  placeholder="Document name ">
                              </div>

                              <div class="col-md-5">
                                <input type="file" name="filename[]" class="form-control form-control-lg">
                              </div>

                              <div class="col-md-2">
                                <input type="button" class="btn btn-danger add_doc" value="Add new (+)">
                              </div>
                            </div>
                            </div>

                          <p>
                             <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Employee">
                             </div>
                          </p>
                  </form>
            </div>
          {{-- </div> <!--end with the !--> --}}
    </div>
</div>

@push('scripts')
    <script src="{{asset('public')}}/js/employee.js"></script>
@endpush

@endsection()





