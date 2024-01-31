@extends('layouts.home')


<!-- Add these links in the head section of your HTML -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>



@section('content')
    <div class="container mt-5">
        <h2>Our collections</h2>

        <table id="productTable" class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Last Updated</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="product-image"></td>
                        <td>{{ $product['title'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['lastUpdated'] }}</td>
                        <td>${{ $product['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form id="addProductForm">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">Image Upload:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="addProduct()">Add Product</button>
        </form>
    </div>

    <style>
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>

    <script>

            let table = new DataTable('#productTable');

            function getCurrentDateTime() {
                const now = new Date();
                const formattedDate = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')} ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}:${now.getSeconds().toString().padStart(2, '0')}`;
                return formattedDate;
            }

            

        function getFormattedLastUpdated(timestamp) {
            const now = new Date();
            const updatedTime = new Date(timestamp);
            const diffInSeconds = Math.floor((now - updatedTime) / 1000);

            if (diffInSeconds < 60) {
                return `Last updated ${diffInSeconds} seconds ago`;
            } else if (diffInSeconds < 3600) {
                const diffInMinutes = Math.floor(diffInSeconds / 60);
                return `Last updated ${diffInMinutes} minutes ago`;
            } else if (diffInSeconds < 86400) {
                const diffInHours = Math.floor(diffInSeconds / 3600);
                return `Last updated ${diffInHours} hours ago`;
            } else {
                const diffInDays = Math.floor(diffInSeconds / 86400);
                return `Last updated ${diffInDays} days ago`;
            }
        }

            function addProduct() {
                const title = $('#title').val();
                const description = $('#description').val();
                const price = $('#price').val();
                const imageInput = $('#image')[0];
                const imageFile = imageInput.files[0];

                if (!title || !description || !price || !imageFile) {
                    alert('All fields are required!');
                    return;
                }

                const formData = new FormData();
                formData.append('title', title);
                formData.append('description', description);
                formData.append('price', price);
                formData.append('image', imageFile);

                
                const newRow = `
                    <tr>
                        <td><img src="${URL.createObjectURL(imageFile)}" alt="${title}" class="product-image"></td>
                        <td>${title}</td>
                        <td>${description}</td>
                        <td>${getCurrentDateTime()}</td>
                        <td>$${price}</td>
                    </tr>
                `;

                $('#productTable tbody').append(newRow);

                $('#addProductForm')[0].reset();

                $.ajax({
                    url: '/save-product',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        console.log('Product saved successfully.');
                    },
                    error: function(error) {
                        console.error('Error saving product:', error);
                    }
                });

                const updatedRow = $('#productTable tbody tr:last-child');
                const lastUpdatedCell = updatedRow.find('td:nth-child(4)');
                lastUpdatedCell.text(getFormattedLastUpdated(getCurrentDateTime()));

            }
    </script>
@endsection

