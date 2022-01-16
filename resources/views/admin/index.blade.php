@extends('layouts.admin')

@section('content')
<section class="py-5">
    <div class="row gy-4">

        <div class="col-lg-4 col-md-6">
            <!-- Dashboard Item-->
            <div class="card rounded-lg border-0 card-striped card-striped-gradient-success">
                <div class="card-body rounded-lg bg-white shadow-sm p-lg-4">
                    <h2 class="h5 text-uppercase letter-spacing-0 mb-0 fw-bold">{{__('All products')}}</h2>
                    <p class="h1 mb-0 fw-bold text-success">{{ $products->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <!-- Dashboard Item-->
            <div class="card rounded-lg border-0 card-striped card-striped-gradient-danger">
                <div class="card-body rounded-lg bg-white shadow-sm p-lg-4">
                    <h2 class="h5 text-uppercase letter-spacing-0 mb-0 fw-bold">{{__('All stocks')}}</h2>
                    <p class="h1 mb-0 fw-bold text-danger">{{ $stocks->count() }}</p>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection
