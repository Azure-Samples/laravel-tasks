@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if (count($videoIds) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Video ID</th>
                                <th>Link</th>
                            </thead>
                            <tbody>
                                @foreach ($videoIds as $videoId)
                                    <tr>
                                        <td class="table-text"><div>{{ $videoId }}</div></td>
                                        <td class="table-text">
                                            <a href="{{ route('translation.edit', $videoId) . '?' . http_build_query(['id' => $videoId]) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
