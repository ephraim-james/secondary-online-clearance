@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Teacher Clears</h3>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\Clear::class)
                        <a href="{{ route('clears.create') }}" class="btn btn-primary">
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
                                    @lang('crud.clears.inputs.clearance_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.user_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.role')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.comment')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.signature')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.date')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clears.inputs.status')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clears as $clear)
                                <tr>
                                    <td>
                                        {{ optional($clear->clearance)->name ?? '-' }}
                                    </td>
                                    <td>{{ optional($clear->user)->name ?? '-' }}</td>
                                    <td>{{ $clear->role ?? '-' }}</td>
                                    <td>{{ $clear->comment ?? '-' }}</td>
                                    <td>{{ $clear->signature ?? '-' }}</td>
                                    <td>{{ $clear->date ?? '-' }}</td>
                                    <td>{{ $clear->status ?? '-' }}</td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $clear)
                                                <a href="{{ route('clears.edit', $clear) }}">
                                                    <button type="button" class="btn btn-success">edit
                                                    </button>
                                                </a>
                                                @endcan @can('view', $clear)
                                                <a href="{{ route('clears.show', $clear) }}">
                                                    <button type="button" class="btn btn-info mx-2">view
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $clear)
                                                <form action="{{ route('clears.destroy', $clear) }}" method="POST"
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
                                    <td colspan="8">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">{!! $clears->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
