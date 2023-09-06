@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Show permission</h3>
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.permissions.inputs.name')</h5>
                        <span>{{ $permission->name ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('permissions.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Permission::class)
                        <a href="{{ route('permissions.create') }}" class="btn btn-light">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
