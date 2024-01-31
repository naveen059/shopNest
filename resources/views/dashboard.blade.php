<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNest</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Payment processed successfully and Order is Successfull!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/apple-touch-icon.png') }}" width="50px"
                    height="50px" style="margin-left: 20px;"> <span style="vertical-align: middle; font-family: oswald; font-size: 30px">ShopNest</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item prod">
                    <a class="nav-link" href="{{ route('product.collection') }}"><i class="fas fa-shopping-bag"></i> Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.history') }}"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
                </li>

                @guest
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Signup</a>
                        </div>
                    </li>
                @else
                    
                    <li class="nav-item">
                        <span class="nav-link"><i class="fas fa-user"></i> {{ auth()->user()->name }}</span>
                    </li>
                    
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>




            <form class="d-flex mx-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <i class="fas fa-search text-white" style="background-color: orange; padding: 8px; border-radius: 5px;"></i>
            </form>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slide1.png') }}" class="d-block w-100 h-50" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to ShopNest</h5>
                    <p>Discover a curated selection of high-quality products across various categories. Enjoy a seamless shopping experience with secure transactions, dedicated customer support, and exclusive deals.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slide2.png') }}" class="d-block w-100 h-50" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to ShopNest</h5>
                    <p>Join the ShopNest community, where quality meets convenience. Shop confidently and stay updated on trends and exciting offers.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div>

            <div class="section-content mt-3">
                <h3 class="section-header">Our Mission:</h3>
                <p style="text-align:center;">
                    ShopNest is dedicated to redefining your online shopping experience by providing a curated
                    selection of high-quality products, seamless transactions, and exceptional customer service.
                </p>
            </div>
            <br>

            <div class="section-content mt-3">
                <h3 class="section-header">What Sets Us Apart:</h3>
                <ul style="text-align:center;">
                    <li><strong>Diverse Product Range:</strong> Discover quality products across electronics,
                        fashion, home essentials, beauty, and more.</li>
                    <li><strong>User-Friendly Platform:</strong> Enjoy a seamless shopping journey with our
                        easy-to-use interface.</li>
                    <li><strong>Secure Transactions:</strong> Your security is our priority – shop with confidence.</li>
                    <li><strong>Dedicated Support:</strong> Reach out anytime; our customer support team is here to help.</li>
                    <li><strong>Exclusive Deals:</strong> Enjoy special promotions and discounts for a more rewarding shopping experience.</li>
                </ul>
            </div>
            <br>

            <div class="section-content mt-3">
                <h3 class="section-header">Join the ShopNest Community:</h3>
                <p style="text-align:center;">
                    ShopNest is more than an e-commerce platform; it's a community where quality meets
                    convenience. Join us, stay updated on trends, and discover exciting offers.
                </p>
            </div>
        </div>
    </div>
</div>




<div class="container mt-5 products">
    <div class="row">
        @foreach ($products->slice(0, 6) as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($product['image']) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['title'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><small class="text-muted">{{ $product['lastUpdated'] }}</small></p>
                        <p class="card-text"><strong>Price: ${{ $product['price'] }}</strong></p>
                        <form action="{{ route('place.order', ['product' => $product['id']]) }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary addToCartBtn">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<div class="container mt-5" style="cursor: pointer;">
        <h2 class="faq-header">Frequently Asked Questions (FAQs)</h2>

        <div id="accordion" class="faq-card">

            <div class="card" onclick="toggleAnswer('collapse1')">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0">
                        How can I track the delivery of my order?
                        <span class="faq-caret-icon" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                            aria-controls="collapse1">+</span>
                    </h5>
                </div>
                <div id="collapse1" class="collapse answer" aria-labelledby="heading1" data-parent="#accordion">
                    <div class="card-body">
                        You can track the delivery of your order by logging into your ShopNest account and navigating to
                        the "Order History" section. There, you will find real-time updates on the processing and shipping
                        status of your purchase.
                    </div>
                </div>
            </div>

            <div class="card" onclick="toggleAnswer('collapse2')">
                <div class="card-header" id="heading2">
                    <h5 class="mb-0">
                        How do I return a product?
                        <span class="faq-caret-icon" data-toggle="collapse" data-target="#collapse2" aria-expanded="false"
                            aria-controls="collapse2">+</span>
                    </h5>
                </div>
                <div id="collapse2" class="collapse answer" aria-labelledby="heading2" data-parent="#accordion">
                    <div class="card-body">
                        To return a product, go to your ShopNest account, navigate to the "Returns" section, and follow
                        the provided instructions. Make sure to review our return policy for eligibility and conditions.
                    </div>
                </div>
            </div>

            <div class="card" onclick="toggleAnswer('collapse3')">
                <div class="card-header" id="heading3">
                    <h5 class="mb-0">
                        Is there a warranty on products?
                        <span class="faq-caret-icon" data-toggle="collapse" data-target="#collapse3" aria-expanded="false"
                            aria-controls="collapse3">+</span>
                    </h5>
                </div>
                <div id="collapse3" class="collapse answer" aria-labelledby="heading3" data-parent="#accordion">
                    <div class="card-body">
                        Yes, many products come with a manufacturer's warranty. Check the product details for information
                        on warranty coverage and duration.
                    </div>
                </div>
            </div>

            <div class="card" onclick="toggleAnswer('collapse4')">
                <div class="card-header" id="heading4">
                    <h5 class="mb-0">
                        How can I contact customer support?
                        <span class="faq-caret-icon" data-toggle="collapse" data-target="#collapse4" aria-expanded="false"
                            aria-controls="collapse4">+</span>
                    </h5>
                </div>
                <div id="collapse4" class="collapse answer" aria-labelledby="heading4" data-parent="#accordion">
                    <div class="card-body">
                        You can contact our customer support team through the "Contact Us" page on our website. We are
                        available to assist you with any inquiries or issues you may have.
                    </div>
                </div>
            </div>


        </div>
    </div>
    <br />


    


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <footer class="mt-auto text-center bg-dark" style="margin-bottom:0px">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-light">Contact Us</h5>
                <p class="text-light">Have questions? Feel free to reach out to our customer support team.</p>
                <p class="text-light">Email: support@shopnest.com</p>
                <p class="text-light">Phone: +91 (80) 9500-9620</p>
            </div>

            <div class="col-md-4">
                <h5 class="text-light">Newsletter</h5>
                <p class="text-light">Subscribe to our newsletter for the latest updates and exclusive offers.</p>
                
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="Your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

            <div class="col-md-4">
                <h5 class="text-light">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">FAQs</a></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid py-3 bg-secondary">
        <p class="text-center text-light mb-0">ShopNest &copy; 2024. All rights reserved.</p>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@if(session('success'))
        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });
        </script>
    @endif


</body>



</html>
