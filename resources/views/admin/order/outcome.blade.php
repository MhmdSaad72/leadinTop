@extends('layouts.admin')

@section('content')
<section class="py-5">
  <!-- Success Flash Message-->
  @include('includes.flash-message')
  
  @if (session('error'))
  <div class="alert alert-danger mb-4" role="alert">
      <p class="mb-0 w-100">
          <i class="fas fa-check-circle me-2"></i>{{ session('error') }}
      </p>
  </div>
  @endif
  @if ($errors->any())
  <!-- Info Alert-->
  <div class="alert alert-danger mb-4" role="alert">
      @foreach ($errors->all() as $key => $value)
      <p class="mb-0">
          <i class="fas fa-info-circle me-2"></i> {{ $value }}
      </p>
      @endforeach
  </div>
  @endif


    <!-- Create product form-->
    <form class="admin-profile-form" action="{{ route('order.outcome') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      @include('admin.order.form')
    
    </form>
</section>
@endsection