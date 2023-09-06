@auth 
<div class="row mb-3">
    <div class="col-sm-12 d-flex justify-content-end text-light">
        Welcome <span class="badge badge-light ml-2" > {{Auth::user()->name}} </span> <span class="badge badge-light ml-2">{{$role}}</span>
    </div>
</div>
<div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{count(\App\Models\Clearance::all())}}</h3>
                                <p>Clearance Requests</p>
                            </div>
                            
                            <div class="icon">
                                <i class="icon fas fa-file"></i>
                            </div>
                            <a href="{{route('clears.index')}}" class="small-box-footer">view<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{count($users)}}<sup style="font-size: 20px"></sup></h3>

                                <p>Staffs</p>
                            </div>
                            
                            <div class="icon">
                                <i class="fa-sharp fa fa-users"></i>
                            </div>
                            
                            <a href="{{ route('users.index') }}" class="small-box-footer">view<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{count(\App\Models\Student::all())}}</h3>

                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{route('students.index')}}" class="small-box-footer">view <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
@endauth