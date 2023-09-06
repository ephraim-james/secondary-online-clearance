@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Create Role</h3>
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>

        <div class="card">ng('crud.roles.create_title')
                </h4>

                <x-form method="POST" action="{{ route('roles.store') }}" class="mt-4">
                    @include('app.roles.form-inputs')

                    <div class="mt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-light">
                            <i class="icon ion-md-return-left text-primary"></i>
                            @lang('crud.common.back')
                        </a>

                        <button type="submit" class="btn btn-primary float-right">
                            <i class="icon ion-md-save"></i>
                            @lang('crud.common.create')
                        </button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection
