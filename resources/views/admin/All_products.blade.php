@include('includes.header')
@include('includes.navbar')

<div class="table-container">
    <H3>

        <table class="all_product_data">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Season</th>
                <th>Price</th>
                <th>Status</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Image3</th>
                <th>Image4</th>
            </thead>
            <tbody>
                @foreach ($products as $stuff)
                <tr>
                    <td>{{ $stuff->id }}</td>
                    <td>{{ $stuff->product_name }}</td>
                    <td>{!! $stuff->product_description !!}</td>
                    <td>{{ $stuff->category->category_name }}</td>
                    <td>{{ $stuff->season->season_name }}</td>
                    <td>{{ $stuff->product_price }}</td>
                    <td>{{ $stuff->product_status }}</td>
                    <td><img src="{{ asset($stuff->product_image1) }}" alt="{{ $stuff->product_name }}" width="100"></td>
                    <td><img src="{{ asset($stuff->product_image2) }}" alt="{{ $stuff->product_name }}" width="100"></td>
                    <td><img src="{{ asset($stuff->product_image3) }}" alt="{{ $stuff->product_name }}" width="100"></td>
                    <td><img src="{{ asset($stuff->product_image4) }}" alt="{{ $stuff->product_name }}" width="100"></td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </H3>
</div>
@include('includes.footer')