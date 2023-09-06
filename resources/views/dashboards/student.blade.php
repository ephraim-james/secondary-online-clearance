@empty($user->student->id)
    @php
        header('Location: ' . route('students.create'));
        exit();
    @endphp
@endempty

@isset($user->student->id)
    <div class="row mb-3">
        <div class="col-sm-12 d-flex justify-content-end">
            <b class="text-light">Welcome</b> <span class="badge badge-light ml-2"> {{ Auth::user()->name }} </span> <span
                class="badge badge-light ml-2">{{ $role }}</span>
        </div>
    </div>
    <div class="row d-flex justify-content-between">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"> <a href="{{ route('students.show', $user->student) }}">Profile</a> </span>
                <span class="info-box-number">
                    100
                    <small>%</small>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
           

            <div class="info-box-content">
                @php 
                $student = Auth::user()->student;
                @endphp
                <span class="info-box-text"> <a href="{{ $student->clearance ? route('student-clearance.show', $student) : '#' }}">Teachers Not cleared</a> </span>
                <span class="info-box-number">{{ $clearance ? $clearance->pending() : '0' }}</span>
            </div>
        </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Teacher Cleaded</span>
                <span class="info-box-number">{{ $clearance ? $clearance->cleared() : '0' }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
</div>
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark" style="background: #0f0f0f !important;">
                <div class="card-header">
                    {{-- <h3 class="card-title">Previous clearance</h3> --}}
                    <div class="row d-flex justify-content-end my-2">
                        <a href="{{ route('create-clearance.store', $student) }}" class="btn btn-primary">Request
                            clearance</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="student_clearances_summary"
                                        class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Class Level</th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">Library</th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">Bursar
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Class Teacher
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">matron/Patron
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Store Keeper
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Academic Master
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">Head Master
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($clearances as $clearance)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $clearance->level ?? '-' }}</td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->{'librarian'} == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->{'librarian'} == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->{'librarian'} ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->{'bursar'} == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->{'bursar'} == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->{'bursar'} ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->{'class_teacher'} == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->{'class_teacher'} == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->{'class_teacher'} ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->matron_patron == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->matron_patron == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->matron_patron ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->store_keeper == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->store_keeper == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->store_keeper ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->{'academic_master'} == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->{'academic_master'} == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->{'academic_master'} ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->{'head_master'} == '0'
                                                            ? '<span class="badge badge-warning">pending</span>'
                                                            : ($clearance->{'head_master'} == '1'
                                                                ? '<span class="badge badge-success">cleared</span>'
                                                                : $clearance->{'head_master'} ?? '-') !!}
                                                    </td>
                                                    <td style="width: 134px;">
                                                        {!! $clearance->completed_clears() == false
                                                            ? '<button class="btn btn-secondary">incomplete</button>'
                                                            : ($clearance->completed_clears() == true
                                                                ? '<button class="btn btn-success">cleared</button>'
                                                                : '<button class="btn btn-info">not started</button>') !!}
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center">
                                                        not requested yet
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endisset






