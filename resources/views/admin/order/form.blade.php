<div class="row">
    <div class="col-lg-3">
              <!-- Input-->
              <select class="form-select shadow-0" name="product_id"/>
              <option disabled selected>{{__('Select Product')}}</option>
              @foreach ($products as $val)
                <option value="{{ $val->id }}" {{ $val->id == old('product_id') ? 'selected' : ''}}>{{ $val->name }}</option>
              @endforeach
              </select>
      </div>
    <div class="col-lg-3">
              <!-- Input-->
              <select class="form-select shadow-0" name="stock_id"/>
              <option disabled selected>{{__('Select Stock')}}</option>
              @foreach ($stocks as $val)
                <option value="{{ $val->id }}" {{ $val->id == old('stock_id') ? 'selected' : ''}}>{{ $val->name }}</option>
              @endforeach
              </select>
      </div>
    <div class="col-lg-3">
              <div class="form-group col-lg-6">
                <input class="form-control shadow-0" id="quantity" type="number" name="quantity"  value="{{old('quantity')}}"/>
            </div>
        </div>
</div>
<div class="row gy-4 my-3">
    <div class="form-group col-12">
        <!-- Submit Button-->
        <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>{{ 'Submit' }}</button>
    </div>

</div>