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
              <h5 class="card-title">Add Department</h5>
                <hr/>

                <br/>
    
                <form>
                  <p>
                    <div class="form-group">
                      {{-- <label for="formGroupExampleInput2">Name</label> --}}
                      <input type="name" required="required" class="form-control form-control-lg" id="" placeholder="Enter Department ">
                    </div>
                    </p>

                            <p>
                                <div class="form-group">
                                  {{-- <label for="formGroupExampleInput2">Role</label> --}}
                                   <select required="required" name="department" class="form-control form-control-lg">
                                       <option value="">Select-Status</option>
                                       <option value="active">active</option>
                                       <option value="inactive">inactive</option>
                                   </select>
                                </div>
                           </p>

                          <p>
                             <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Role">
                             </div>
                          </p>
                  </form>
            </div>
          </div>
    
    </div>
</div>




@endsection()