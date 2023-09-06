@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Show users</h3>
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.users.inputs.name')</h5>
                        <span>{{ $user->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.users.inputs.email')</h5>
                        <span>{{ $user->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.users.inputs.role')</h5>
                        <span>{{ $user->role ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.users.inputs.username')</h5>
                        <span>{{ $user->username ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.users.inputs.image')</h5>
                        <x-partials.thumbnail
                            src="{{ $user->image ? url(\Storage::url($user->image)) : asset('default.png') }}"
                            size="150" />
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.roles.name')</h5>
                        <div>
                            @forelse ($user->roles as $role)
                                <div class="badge badge-primary">{{ $role->name }}</div>
                                <br />
                            @empty -
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\User::class)
                        <a href="{{ route('users.create') }}" class="btn btn-light">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
