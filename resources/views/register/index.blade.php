@extends('layout')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{ $err}} <br> 
            @endforeach
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('faild'))
        <div class="alert alert-danger">{{ Session::get('faild') }}</div>
    @endif
    <form action="{{route('post.register')}}" method="post">
        @csrf
        <h3 style="text-align: center; color: rgb(245 31 31);">AGI - PHP - Entrance Test</h3>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
            <input type="Text" class="form-control" name="name" value="{{ old('name') }}" id="exampleFormControlInput1" placeholder="*Họ và tên">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Số điện thoại</label>
            <input type="Text" class="form-control" value="{{ old('phone') }}" name="phone" id="exampleFormControlInput2"
                placeholder="*Số điện thoại">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleFormControlInput3"
                placeholder="name@kyanon.digital">
        </div>
        <label for="exampleFormControlInput4" class="form-label">Độ tuổi</label>
        <select class="form-select mb-3" aria-label="Default select example" id="exampleFormControlInput4" name="old">
            <option selected value="10-20">10 - 20</option>
            <option value="20-30">20 - 30</option>
            <option value="30-50">30 - 50</option>
        </select>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả bản thân</label>
            <textarea name="description" placeholder="Mô tả bản thân" class="form-control"
                id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
