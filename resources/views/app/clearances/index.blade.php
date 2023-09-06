@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Clearances</h3>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\Clearance::class)
                        <a href="{{ route('clearances.create') }}" class="btn btn-primary">
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
                                    @lang('crud.clearances.inputs.student_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.registration_number')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.block_number')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.room_number')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.level')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.librarian')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.bursar')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.class_teacher')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.matron_patron')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.store_keeper')
                                </th>
                                <th class="text-left">
                                    @lang('crud.clearances.inputs.head_master')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clearances as $clearance)
                                <tr>
                                    <td>
                                        {{ optional($clearance->student)->id_number ?? '-' }}
                                    </td>
                                    <td>{{ $clearance->name ?? '-' }}</td>
                                    <td>
                                        {{ $clearance->registration_number ?? '-' }}
                                    </td>
                                    <td>{{ $clearance->block_number ?? '-' }}</td>
                                    <td>{{ $clearance->room_number ?? '-' }}</td>
                                    <td>{{ $clearance->level ?? '-' }}</td>
                                    <td>{{ $clearance->{'librarian'} ?? '-' }}</td>
                                    <td>{{ $clearance->{'bursar'} ?? '-' }}</td>
                                    <td>{{ $clearance->{'class_teacher'} ?? '-' }}</td>
                                    <td>{{ $clearance->matron_patron ?? '-' }}</td>
                                    <td>{{ $clearance->store_keeper ?? '-' }}</td>
                                    <td>{{ $clearance->{'head_master'} ?? '-' }}</td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $clearance)
                                                <a href="{{ route('clearances.edit', $clearance) }}">
                                                    <button type="button" class="btn btn-success">edit
                                                    </button>
                                                </a>
                                                @endcan @can('view', $clearance)
                                                <a href="{{ route('clearances.show', $clearance) }}">
                                                    <button type="button" class="btn btn-info mx-2">view
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $clearance)
                                                <form action="{{ route('clearances.destroy', $clearance) }}" method="POST"
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
                                    <td colspan="13">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="13">{!! $clearances->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
