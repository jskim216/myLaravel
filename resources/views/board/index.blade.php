@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">대충 만든 게시판</div>
                    <div class="panel-body">
                        <table width="100%">
                            <colgroup>
                                <col width="5%"/>
                                <col width=""/>
                                <col width="15%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <th>번호</th>
                                <th>제목</th>
                                <th>작성자</th>
                                <th>조회수</th>
                            </thead>
                            <tbody>
                            @foreach($board as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{ route('board.view', $item->id) }}">{{ $item->title }}</a></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->hit }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                    {!! $board->render() !!}
            </div>

        </div>
    </div>
@endsection
