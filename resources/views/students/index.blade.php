@extends('students.master')

@section('content')

@if($message = Session::get('succsess'))

<div class="alert alert-success">
    {{$message}}
</div>
@endif

<div class="container mt-5">
        <h3 class="text-center text-uppercase text-success mt-3 mb-3">Quản lý sinh viên</h3>
        <a href="{{route('students.create')}}" class="btn btn-success" >Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã sinh viên</th>
                    <th scope="col">Tên sinh viên</th>
                    <th scope="col">Địa chỉ Email</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(count($students)>0)
                    @foreach($students as $row)
                    <tr>
                        <td >{{ $row->StudentID}}</td>
                        <td >{{ $row->StudentName}}</td>
                        <td >{{ $row->StudentEmail}}</td>
                        <td >@if($row->StudentGender == 0)Nam @else Nữ @endif</td>
                        <td >{{ $row->ClassRoom->ClassRoomName}}</td>
                        <td>
                            <form method="post" action="{{route('students.destroy',$row->StudentID)}}">
                                @csrf   
                                @method('DELETE')
                                <a href="{{ route('students.show', $row->StudentID)}}" class="btn btn-primary">xem chi tiết</a>
                                <a href="{{ route('students.edit',$row->StudentID)}}" class="btn btn-warning">Sửa</a>
                                <input type="submit" class="btn btn-danger btn-sn" value="Xóa">
                            </form>  

                        </td>
                    </tr>   
                    @endforeach
                @else 
                    <tr>
                        <td colspan="5" class="text-center">No data found</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {!! $students->links()!!}
    </div>
@endsection