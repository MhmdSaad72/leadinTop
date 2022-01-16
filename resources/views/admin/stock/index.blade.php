@extends('layouts.admin')

@section('style')
  {{-- dataTable --}}
<link rel="stylesheet" href="{{asset("vendor/vanilla-datatables/vanilla-dataTables.min.css")}}">
@endsection

@section('content')
<section class="py-5">
  <!-- Success Flash Message-->
  @include('includes.flash-message')
  <a class="btn btn-gradient-success " href="{{ route('stocks.create') }}">
    <i class="fas fa-plus me-2"></i>
    {{__('Create new stock')}}
</a>

    <!-- Subscribers Table-->
    <table class="table bg-white shadow rounded table-striped text-nowrap mb-0" id="subscribersTable">
        <thead>
            <tr>
                <th>{{__('#')}}<span class="pe-4 pe-lg-2"> </span></th>
                <th>{{__('Name')}}</th>
                <th>{{__('Quantity')}}</th>
                <th>{{__('Added')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($stocks as $key => $value)
            <tr>
              <td> <strong>{{ $loop->iteration }}</strong></td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->quantity() }}</td>
              <td>{{ $value->created_at }}</td>
                <td>
                  <a class="btn btn-sm btn-success py-1 px-2 text-white" href="{{ route('stocks.edit', $value->id) }}"><i class="fas fa-edit text-xs"></i></a>
                  <form  action="{{ route('stocks.destroy', $value->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger py-1 px-2" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt text-xs"></i></button>
                  </form>
                </td>
              </tr>
          @endforeach
        </tbody>
    </table>

</section>
@endsection
@section('js')
<script src="{{asset('vendor/vanilla-datatables/vanilla-dataTables.min.js')}}"></script>
<script>
    /* =============================================
            VANILLA DATATABLES INITIALIZING
            ============================================== */
    let myTable = document.getElementById("subscribersTable");
    let dataTable = new DataTable(myTable, {
        labels: {
            placeholder: "Search...",
            perPage: "{select}",
            info: "Showing {start} to {end} of {rows} entries",
        }
    });

    function insertBsClasses() {
        let searchInput = document.querySelector('.dataTable-input');
        let searchSelector = document.querySelector('.dataTable-selector');

        searchInput.classList.add('form-control');
        searchSelector.classList.add('form-select');
    }

    dataTable.on("datatable.init", function() {
        insertBsClasses()
    });
</script>
@endsection
