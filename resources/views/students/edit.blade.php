@extends('students.master')

@section('content')
<div class="card">
    <div class="card-header">Sửa thông tin cá nhân</div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('students.update',$student->StudentID)}}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Tên sinh viên</label>
                <div class="col-sm-10">
                    <input value="{{ $student->StudentName}}" type="text" name="StudentName" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Địa chỉ Email</label>
                <div class="col-sm-10">
                    <input value="{{$student->StudentEmail}}" type="text" name="StudentEmail" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Giới tính</label>
                <div class="col-sm-10">
                    <select name="StudentGender" class="form-control">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="ClassRoomID" class="form-label">Lớp</label>
                <select name="ClassRoomID" id="ClassRoomID" class="ClassRoomID" required>
                    @foreach($classrooms as $classroom)
                    <option value="{{$classroom->ClassRoomID}}">@if ($classroom->ClassRoomID==$student->ClassroomID) selected @endif
                        {{$classroom->ClassRoomName}} </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{$student->StudentID}}">
                <a href="{{ route('students.index')}}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Sửa">
            </div>
        </form>
<script>
    document.getElementsByName('StudentGender')[0].value = "{{ $student->StudentGender}}";
</script>
    </div>
</div>

@endsection