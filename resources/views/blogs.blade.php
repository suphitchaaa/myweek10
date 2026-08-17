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
                <th scope="col">Edit</th>
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
                            <a href="{{ Route('change', $item->id) }}" class="btn btn-success">เผยแพร่</a>
                        @else
                            <a href="{{ Route('change', $item->id) }}" class="btn btn-secondary">ไม่เผยแพร่</a>
                        @endif
                    </td>
                    <td><a href="{{ route('edit', $item->id) }}" class="btn btn-warning">แก้ไข</a></td>
                    <td><a href="{{ route('delete', $item->id) }}"class="btn btn-danger"
                            onclick="return confirm('ยืนยันการลบบทความ {{ $item->title }}จริงหรือใหม่')">ลบ</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
