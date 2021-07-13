<x-admin.layout>
    <a href="/Admin/products/create">Create Product</a>


    <table width="900" align="center">
        <tr>
            <td>S.n</td>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ substr($product->product_desc, 0, 50) }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href=" /admin/products/edit/{{ $product->id }}">Edit</a>
                    <a href="/admin/products/destroy/{{ $product->id }}">Delete</a>


                </td>
            </tr>
        @endforeach
    </table>
</x-admin.layout>
