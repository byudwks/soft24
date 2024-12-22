@extends('navigation.nav')


@push('css')
      @livewireStyles
@endpush

@push('js')
      @livewireScripts
@endpush


@section('content')
      
      <div>
             @livewire('software.software')
      </div>
      
@endsection