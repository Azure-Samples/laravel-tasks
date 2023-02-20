@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current Tasks -->
            @if (count($questions) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Question List
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Question ID</th>
                                <th>Question</th>
                                <th>Video with</th>
                                <th>Link</th>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td class="table-text"><div>{{ $question->id }}</div></td>
                                        <td class="table-text"><div>{{ $question->title }}</div></td>
                                        <td class="table-text"><div>{{ $question->getVideo(); }}</div></td>
                                        <td class="table-text">
                                            <a href="{{ route('question.edit', $question->id) }}">Edit</a>
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
