@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Show Messages</h3>
                </div>
                <div class="col-md-6 text-right">

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.messages.inputs.user_id')</h5>
                        <span>{{ optional($message->user)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.messages.inputs.email')</h5>
                        <span>{{ $message->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.messages.inputs.body')</h5>
                        <span>{{ $message->body ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('messages.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Message::class)
                        <a href="{{ route('messages.create') }}" class="btn btn-light">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
