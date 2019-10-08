@extends('layouts.private')

@section('content')
    <section class="section">
        <div class="container">
            <table class="table is-fullwidth">
                <thead>
                <tr>
                    <th>Provider</th>
                    <th>Company</th>
                    <th>Title</th>
                    <th>Ago</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr title="{{ json_encode($job, JSON_PRETTY_PRINT) }}">
                        <td>
                            <div class="is-flex items-center">
                                <figure class="image is-32x32 mr-05">
                                    @if($icon = $job->config('iconUrl'))
                                        <img alt="{{ $job->config('name') }}" src="{{ $icon }}">
                                    @endif
                                </figure>
                                <span>{{ $job->config('name') }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="is-flex items-center">
                                <figure class="image is-32x32 mr-05">
                                    @if($icon = $job->logo)
                                        <img alt="{{ $job->company }}" src="{{ $icon }}">
                                    @endif
                                </figure>
                                <span>{{ $job->company }}</span>
                            </div>
                        </td>
                        <td>
                            <a href="{{ $job->url }}" target="_blank">{{ $job->title }}</a>
                        </td>
                        <td title="{{ $job->created_at }}">
                            {{ $job->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section class="section">
        <div class="container">
            {{ $jobs->links('vendor.pagination.bulma') }}
        </div>
    </section>
@endsection
