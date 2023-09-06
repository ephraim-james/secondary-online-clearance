@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    @if (Auth::user()->hasRole('student'))
                        <h3 class="text-light">Complete your student profile</h3> 
                    @else
                        @lang('crud.students.create_title')
                    @endif
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('students.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i>back</a>
                    
                </h4>

                <x-form method="POST" action="{{ route('students.store') }}" class="mt-4">
                    @include('app.students.form-inputs')

                    <div class="mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-light">
                            <i class="icon ion-md-return-left text-primary"></i>
                            @lang('crud.common.back')
                        </a>

                        <button type="submit" class="btn btn-primary float-right">
                            <i class="icon ion-md-save"></i>
                            submit
                        </button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection
