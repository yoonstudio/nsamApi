@extends('layout.master')

@section('content')
    <p> 자식 뷰의 'contents' 세션입니다. </p>
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert("자식뷰 script 세션");
    </script>
@endsection
