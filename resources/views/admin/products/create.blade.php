<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">


                <form action="/Admin/products/store" method="POST" enctype="multipart/form-data">
                    <h2 style=text-align:center;>Create product</h2>
                    @csrf
                    <b>product name:</b>
                    <input type="text" name="product_name" id="" class="form-control"
                        value="{{ old('product_name') }}"><br>
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <b>product Desc: </b> <textarea name="product_desc" id="" cols="20" rows="5"
                        class="form-control">{{ old('product_name') }}</textarea><br>
                    @error('product_desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <b>Price:</b> <input type="text" name="price" class="form-control"
                        value="{{ old('price') }}"><br><br>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <b>Category:</b>
                    <x-form.select name="category_id" class="form-control">

                        <option value="0">Select a category</option>

                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->id == old('category_id') ? 'selected' : '' }} {{ $category->name }}

                            </option>

                        @endforeach


                    </x-form.select> <br>

                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br><br>

                    <!-- <select name="category_id" id="">
<option value="0">Select a category</option>
@foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select> -->
                    <b>image:</b>
                    <input type="file" name="image_upload">
                    @error('image_upload')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br><br>
                    <b><input type="submit" value="save" class="form-control"></b>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
