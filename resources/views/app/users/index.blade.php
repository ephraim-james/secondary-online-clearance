@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Users</h3>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\User::class)
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    @lang('crud.users.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.users.inputs.email')
                                </th>
                                <th class="text-left">
                                    @lang('crud.users.inputs.role')
                                </th>
                                <th class="text-left">
                                    @lang('crud.users.inputs.username')
                                </th>
                                <th class="text-left">
                                    @lang('crud.users.inputs.image')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name ?? '-' }}</td>
                                    <td>{{ $user->email ?? '-' }}</td>
                                    <td>{{ $user->role ?? '-' }}</td>
                                    <td>{{ $user->username ?? '-' }}</td>
                                    <td>
                                        <x-partials.thumbnail
                                            src="{{ $user->image ? url(\Storage::url($user->image)) : asset('default.png') }}" />
                                    </td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $user)
                                                <a href="{{ route('users.edit', $user) }}">
                                                    <button type="button" class="btn btn-success">edit
                                                    </button>
                                                </a>
                                                @endcan @can('view', $user)
                                                <a href="{{ route('users.show', $user) }}">
                                                    <button type="button" class="btn btn-info mx-2">view
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $user)
                                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="icon ion-md-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">{!! $users->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
