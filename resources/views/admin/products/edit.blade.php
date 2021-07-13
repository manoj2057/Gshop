<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <h2 style=text-align:center;>update product: {{ $product->product_name }}</h2>
                <form action="/admin/products/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">



                    <b>product name:</b>
                    <input type="text" name="product_name" id="" value="{{ $product->product_name }}"
                        class="form-control"><br>
                    <b>product Desc:</b> <textarea name="product_desc" id="" cols="20" rows="5"
                        class="form-control">{{ $product->product_desc }}</textarea><br><br>

                    <b>Price:</b> <input type="text" name="price" value="{{ $product->price }}"
                        class="form-control"><br>

                    <b>Category:</b>
                    <x-form.select name="category_id" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </x-form.select> <br>
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
                    <input type="submit" value="save" class="form-control">
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
