@include('includes.merchantheader')
<div class="addtoproduct">

    <h2>All Fields are Required , Kindly Fill All the Fields</h2>
    <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (isset($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif
            @if (isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        <table>
            <tr>
                <th>
                    <br>Product Name
                </th>
                <td>
                    <textarea name="product_name" cols="30" rows="5" ></textarea>
                </td>
            </tr>

            <tr>
                <th>
                    <br>Description
                </th>
                <td>
                    <textarea name="product_description" cols="40" rows="10" ></textarea>
                </td>
            </tr>

            <tr>
                <th>
                    <br>Keywords
                </th>
                <td>
                    <textarea name="product_keyword" cols="30" rows="8" ></textarea>
                </td>
            </tr>

            <tr>
                <th>
                    <br>Category
                </th>
                <td>
                    <select name="category_id">
                            <option value="choose" disabled selected>Choose Category</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                            <option value="3">Children</option>
                        </select>
                </td>
            </tr>

            <tr>
                <th>
                    <br>Season
                </th>
                <td>
                    <select name="Season_id">
                        <option value="choose" disabled selected>Choose Season</option>
                        <option value="1">Spring</option>
                        <option value="2">Summer</option>
                        <option value="3">Autumn</option>
                        <option value="4">Winter</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>
                    Image Input Method
                </th>
                <td >
                    <select name="Method" id="image-option">
                        <option value="choose" disabled selected>Choose Method</option>
                        <option value="url">Image URL</option>
                        <option value="upload">Upload Image</option>
                    </select>
                </td>
            </tr>

            <tr id="url-input" style="display: none;">
                <th>
                    <br>Image URL
                </th>
                <td>
                    <input type="text" name="image_url_1" placeholder="Image 1"><br>
                    <input type="text" name="image_url_2" placeholder="Image 2"><br>
                    <input type="text" name="image_url_3" placeholder="Image 3"><br>
                    <input type="text" name="image_url_4" placeholder="Image 4">
                </td>
            </tr>

            <tr id="upload-input" style="display: none;">

                <th>
                    <br>Image Upload
                </th>
                <td>
                    <input type="file" name="image_1" placeholder="Image 1"><br>
                    <input type="file" name="image_2" placeholder="Image 2"><br>
                    <input type="file" name="image_3" placeholder="Image 3"><br>
                    <input type="file" name="image_4" placeholder="Image 4">
                </td>
            </tr>

            <tr>
                <th>
                    <br>Price / Unit
                </th>
                <td>
                    <input type="number" name="product_price" step="0.01" min="10" class="num">
                </td>
            </tr>

            <tr>
                <th>
                    <br>Status
                </th>
                <td>
                    <select name="product_status">
                            <option value="active" selected>active</option>
                            <option value="inactive">inactive</option>
                        </select>
                </td>
            </tr>

            <tr>
                <th>
                    <br>Stock Quantity
                </th>
                <td>
                    <input type="number" name="product_stock" min="1" class="num">
                </td>
            </tr>
        </table>  
        <div class="butn">    
            <button type="submit">Add Product</button>
        </div>  
    </form>
</div>
<script src="{{ asset('js/addproduct.js') }}"></script>
<script src="{{ asset('js/msg.js') }}"></script>
@include('includes.footer')
