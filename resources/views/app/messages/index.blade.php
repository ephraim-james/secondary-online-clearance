@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Notifications</h3>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\Message::class)
                        <a href="{{ route('messages.create') }}" class="btn btn-primary">
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
                                    @lang('crud.messages.inputs.user_id')
                                </th>
                                <th class="text-left">
                                    @lang('crud.messages.inputs.email')
                                </th>
                                <th class="text-left">
                                    @lang('crud.messages.inputs.body')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr>
                                    <td>{{ optional($message->user)->name ?? '-' }}</td>
                                    <td>{{ $message->email ?? '-' }}</td>
                                    <td>{{ $message->body ?? '-' }}</td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $message)
                                                <a href="{{ route('messages.edit', $message) }}">
                                                    <button type="button" class="btn btn-success">edit
                                                    </button>
                                                </a>
                                                @endcan @can('view', $message)
                                                <a href="{{ route('messages.show', $message) }}">
                                                    <button type="button" class="btn btn-info mx-2">view
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $message)
                                                <form action="{{ route('messages.destroy', $message) }}" method="POST"
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
                                    <td colspan="4">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">{!! $messages->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
