@extends('layout')

@section('title')
    บทความทั้งหมด
@endsection

@section('content')
    <h2 class="text-center py-2">บทความทั้งหมด</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">title</th>
                {{-- <th scope="col">content</th> --}}
                <th scope="col">status</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    {{-- <td>{{ Str::limit($item->content, 10) }}</td> --}}
                    <td>
                        @if ($item->status)
                            <spam class="btn btn-outline-success">เผยแพร่</spam>
                        @else
                            <spam class="btn btn-outline-secondary">ไม่เผยแพร่</spam>
                        @endif
                    </td>

                    <td><a href="/delete/{{ $item->id }} "class="btn btn-danger"
                            onclick="return confirm('ยืนยันการลบบทความ {{ $item->title }}จริงหรือใหม่')">ลบ</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
