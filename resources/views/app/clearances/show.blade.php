@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Show Clearances</h3>
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.student_id')</h5>
                        <span>{{ optional($clearance->student)->id_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.name')</h5>
                        <span>{{ $clearance->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.registration_number')</h5>
                        <span>{{ $clearance->registration_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.block_number')</h5>
                        <span>{{ $clearance->block_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.room_number')</h5>
                        <span>{{ $clearance->room_number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.level')</h5>
                        <span>{{ $clearance->level ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.librarian')</h5>
                        <span>{{ $clearance->{'librarian'} ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.bursar')</h5>
                        <span>{{ $clearance->{'bursar'} ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.class_teacher')</h5>
                        <span>{{ $clearance->{'class_teacher'} ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.matron_patron')</h5>
                        <span>{{ $clearance->matron_patron ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.store_keeper')</h5>
                        <span>{{ $clearance->store_keeper ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.clearances.inputs.head_master')</h5>
                        <span>{{ $clearance->{'head_master'} ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('clearances.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Clearance::class)
                        <a href="{{ route('clearances.create') }}" class="btn btn-light">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
