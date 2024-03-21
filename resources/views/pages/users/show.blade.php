@extends('layouts.guest')

@section('content')
    <h1 @click="alert(123)">hello world</h1>
@endsection

@push('scripts')
    <script>
        // alert(123)
    </script>
@endpush
