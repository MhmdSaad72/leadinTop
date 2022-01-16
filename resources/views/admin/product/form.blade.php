<div class="row gy-4">
    <div class="form-group col-lg-6">
        <!-- Input-->
        <label class="form-label h5 mb-0 required" for="name">{{__('Name')}}</label>
        <input class="form-control shadow-0" id="name" type="text" name="name" placeholder="e.g. Jason Doe" value="{{ isset($product) ? $product->name : old('name') }}" />
    </div>
</div>
<div class="row gy-4 my-3">
    <div class="form-group col-lg-6">
        <!-- Input-->
        <label class="form-label h5 mb-0" for="pageFavicon">{{__('Image')}}</label>
        <input class="form-control shadow-0" id="pageFavicon" type="file" name="image" />
    </div>
</div>
<div class="row gy-4 my-3">
    <div class="form-group col-12">
        <!-- Submit Button-->
        <button class="btn btn-gradient-success" type="submit"> <i class="me-2 fas fa-check"></i>{{ isset($product) ? 'Save changes' : 'Submit'}}</button>
    </div>

</div>