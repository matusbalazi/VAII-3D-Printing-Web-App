@extends('layouts.master')
{{-- dedi z master layoutu --}}

@section('page-name')
Gallery
@endsection

@section('page-content')
<div class="white-space">
    {{-- tu sa namontuje React-Gallery --}}
    <div class="container" id="react-gallery" data-gallery-url="{{ route('gallery-images.index') }}"
        data-user-url="{{ route('api-user') }}">
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/gallery.js') }}"></script>
@endsection