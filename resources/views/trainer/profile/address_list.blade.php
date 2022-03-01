@extends('trainer.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
{{--
<strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>

{!! __('strings.backend.welcome') !!} --}}

	<!-- ------------------- -->
	<table id="pages-table" class="table" data-ajax_url="{{ route("trainer.address.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('addresses.title') }}</th>
                                <th>{{ trans('addresses.fields.city') }}</th>
                                <th>{{ trans('addresses.fields.state') }}</th>
                                <th>{{ trans('addresses.fields.status') }}</th>
                                <th>{{ trans('addresses.fields.post_code') }}</th>
                                <th>{{ trans('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

	<!-- ------------------- -->

	


@endsection


@section('pagescript')

<script>
    FTX.Utils.documentReady(function() {
        FTX.Address.list.init();
    });
</script>
@endsection