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
    @vite('resources/css/app.css')

    <style media="screen">
      .card{
        border:none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
      }
      p{
        font-family: 'Lato', 'Montserrat';
      }

      .nav-link:hover{
        color: tomato;
      }
      .nav-link:active{
        color: maroon;
      }

      .parallax {
          background-image: url('https://websitedemos.net/custom-printing-02/wp-content/uploads/sites/459/2020/01/banner-02.jpg'); /* Replace 'your-parallax-image.jpg' with your image URL */
          background-attachment: fixed;
          background-size: cover;
          background-position: center;
          height: 80vh;
          color: black;
      }
      .shop{
        border-radius:0px;
        width: 360px;
        margin-top: 30px;
      }
      .shop:hover{
        color: black;
        background: white;
        border: none !important;
      }


      .color-circle {
          width: 20px;
          height: 20px;
          border-radius: 50%;
          margin-right: 5px;
          cursor: pointer;
          border: 2px solid transparent;
      }

      .color-circle:hover {
          border-color: black;
      }

    </style>
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
                    height="50px" style="margin-left: 20px;"> <span style="vertical-align: middle; font-family: 'Victor serif'; font-size: 30px;">ShopNest</span></a>
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

<div id="mainSection" class="sectionpart">
    <section class="row">
        <div class="col-md-6">
            <div class="container" style="margin-top: 20%; margin-left: 50px;">
              <h2 class="mt-4 mx-2"><span style="font-family: 'GT America'">Welcome to</span> <strong><span style="color:orange; font-family:'inter';">ShopNest</span></strong></h2>
              <p class="container text-muted">
                  Redefining your online shopping experience with curated selections, seamless transactions, and exceptional service.
              </p>
              <button type="button" name="button" class="btn btn-danger mx-2 mt-5" onclick="window.location.href = '/register'">Register Now <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="imgsection">
                <img src="{{ asset('images/gif2.gif') }}" class="d-block w-100" style="float:right;" alt="...">
            </div>
        </div>
    </section>
</div>


<div class="mt-5 mx-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card info p-3 text-dark">
                    <div class="card-body">

                        <h5 class="card-title"><i class="fas fa-headset "></i> 24/7 Support</h5>
                        <img src="{{asset('/images/support.svg')}}" height="250px" width="250px" class="img-fluid mx-auto d-block mb-3">
                        <p class="card-text text-muted">Get assistance anytime, anywhere. Our support team is available round the clock to help you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card info p-3 text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-shipping-fast"></i> Fast Delivery</h5>
                        <img src="{{asset('/images/fast.jpg')}}" height="200px" width="200px" class="img-fluid mx-auto d-block mb-3">
                        <p class="card-text text-muted">Enjoy speedy delivery of your orders. We strive to get your items to you as quickly as possible.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 info text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-lock"></i> Secure Transactions</h5>
                        <img src="{{asset('/images/secure.svg')}}" height="200px" width="200px" class="img-fluid mx-auto d-block mb-3">
                        <p class="card-text text-muted">Shop with confidence. Your transactions are encrypted and securely processed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
    <h2 class="text-center" style="font-family: 'Victor serif'">Featured <span class="text-secondary">Products</span></h2>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        @foreach ($products->slice(0, 6) as $product)
        <div class="col">
            <div class="card product h-100">
                <img src="{{ asset($product['image']) }}" class="card-img-top" width="60%" height="50%" alt="Product Image">
                <div class="card-body">
                    <span class="badge bg-success" style="float:right;">IN-STOCK</span>
                    <h5 class="card-title mt-2 mb-3">{{ $product['title'] }} <i class="far heart fa-heart"></i></h5>
                    <h6> ${{ $product['price'] }} </h6>
                    <p class="card-text text-muted">{{ $product['description'] }}</p>

                    @if(strpos($product['title'], 'shoes') !== false)
                    <div class="mb-3">
                        <div class="d-inline">
                            <label for="color-black" class="color-circle bg-black"></label>
                            <label for="color-white" class="color-circle bg-light" style="border: 0.4px solid black;"></label>
                            <label for="color-gray" class="color-circle bg-secondary"></label>
                            <label for="color-yellow" class="color-circle bg-warning"></label>
                            <label for="color-blue" class="color-circle bg-primary"></label>
                            <label for="color-green" class="color-circle bg-success"></label>
                            <label for="color-red" class="color-circle bg-danger"></label>
                            <label for="color-info" class="color-circle bg-info"></label>

                        </div>
                        <input type="hidden" id="selected-color" name="color" value="">
                    </div>
                    @else
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="size" id="size-xs" value="xs">
                                <label class="form-check-label" for="size-xs">XS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="size" id="size-s" value="s">
                                <label class="form-check-label" for="size-s">S</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="size" id="size-m" value="m">
                                <label class="form-check-label" for="size-m">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="size" id="size-l" value="l">
                                <label class="form-check-label" for="size-l">L</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="size" id="size-xl" value="xl">
                                <label class="form-check-label" for="size-xl">XL</label>
                            </div>

                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="input-group input-group-sm">
                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseValue()">-</button>
                            <input type="text" class="form-control text-center w-25" id="quantity" value="1" aria-label="Quantity" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="increaseValue()">+</button>
                        </div>
                    </div>
                    <form action="{{ route('place.order', ['product' => $product['id']]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <button type="submit" class="btn btn-warning btn-sm mt-3 w-100"> <i class="fa-solid fa-cart-shopping"></i> &nbsp; <span style="font-family: 'Open Sans'; font-weight: bold;">Add to Cart</span></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>





<div id="shoppingTrendChart" class="container" style="min-width: 310px; height: 400px; margin: 40px auto"></div>


<div class="parallax">
    <div class="container">
        <div class="row">
            <div class="mx-auto" style="margin-top: 12em;">
                <h3 class="text-primary">Hurry Up!</h3>
                <h2 class="text-secondary">Deal of the Day!</h2>
                <h5 class="text-muted">Buy This T-shirt At 20% Discount, Use Code Off20</h5>
                <a href="{{ route('product.collection') }}" class="btn btn-default shop btn-lg" style="border: 2px solid gray;">
                    Shop Now <i class="fas fa-angle-right ml-2"></i>
                </a>
            </div>
        </div>
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

    <br>
    <h3 class="text-center"><span style="font-family: 'Open sans'">Customer Experiances and </span> <strong><span style="color:orange; font-family:'inter';">Feedback</span></strong></h3>
    <div class="p-3 m-3 text-center">
      <span class="badge text-dark" style="background: aliceblue; font-size: 16px; font-family: 'inter';">Testimonials</span>
    </div>

    <div class="container" style="margin-bottom: 30px;">
    <div class="row">

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="review-header d-flex align-items-center justify-content-center p-3" style="border-radius: 30px; background: antiquewhite;">
                        <img src="https://websitedemos.net/custom-printing-02/wp-content/uploads/sites/459/2019/06/client02-free-img.jpg" class="rounded-circle mr-3" width="50" height="50" alt="Diana Burnwood">
                        <div>
                            <h5 class="card-title mb-0">Diana Burnwood</h5>
                            <div class="star-rating mt-1">
                                @for($i=1; $i< 5; $i++)
                                <i class="fa fa-star" style="color: gold;"></i>
                                @endfor
                                <i class="fas fa-star-half-alt" style="color: gold;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-content mt-3">
                        <p class="card-text">"Loved the way products are depicted!. Had wonderfull experiance"</p>
                    </div>
                    <div class="review-footer mt-3 d-flex justify-content-between align-items-center">
                        <span class="text-muted">Date: September 7th, 2023</span>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="review-header d-flex align-items-center justify-content-center p-3" style="border-radius: 30px; background: antiquewhite;">
                        <img src="https://websitedemos.net/custom-printing-02/wp-content/uploads/sites/459/2019/06/client2-free-img.png" class="rounded-circle mr-3" width="50" height="50" alt="Diana Burnwood">
                        <div>
                            <h5 class="card-title mb-0">Jessica Foxx</h5>
                            <div class="star-rating mt-1">
                                @for($i=1; $i<= 5; $i++)
                                <i class="fa fa-star" style="color: gold;"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="review-content mt-3">
                        <p class="card-text">"Great products! 👍 Looking forward to buying them!"</p>
                    </div>
                    <div class="review-footer mt-3 d-flex justify-content-between align-items-center">
                        <span class="text-muted">Date: January 15, 2024</span>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="review-header d-flex align-items-center justify-content-center p-3" style="border-radius: 30px; background: antiquewhite;">
                        <img src="https://websitedemos.net/custom-printing-02/wp-content/uploads/sites/459/2019/06/client3-free-img.png" class="rounded-circle mr-3" width="50" height="50" alt="Diana Burnwood">
                        <div>
                            <h5 class="card-title mb-0">Lilly Granger</h5>
                            <div class="star-rating mt-1">
                                @for($i=1; $i<= 5; $i++)
                                <i class="fa fa-star" style="color: gold;"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="review-content mt-3">
                        <p class="card-text">"I bought a nice dress for my 34th birthday, my family admired the product 😍"</p>
                    </div>
                    <div class="review-footer mt-3 d-flex justify-content-between align-items-center">
                        <span class="text-muted">Date: March 2nd, 2024</span>

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


    <footer class="mt-auto text-center bg-dark" style="margin-bottom:0px; margin-top: 50px;">
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

    <div class="container-fluid py-3 bg-dark">
        <p class="text-center text-light mb-0">ShopNest &copy; 2024. All rights reserved.</p>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
@if(session('success'))
        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });

        </script>
    @endif

    <script>


    $(".heart").on("click", function() {
        $(this).toggleClass("fas fa-heart far fa-heart");
        var color = $(this).hasClass("fas fa-heart") ? "red" : "black";
        $(this).css("color", color);

    });


    $(".color-circle").click(function() {
        $(".color-circle").removeClass("selected");
        $(this).addClass("selected");
        var selectedColor = $(this).attr("for").split("-")[1];
        $("#selected-color").val(selectedColor);
    });


     function increaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('quantity').value = value;
  }

  function decreaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    document.getElementById('quantity').value = value < 1 ? 1 : value;
  }

  var shoppingTrendData = [
        { date: '2024-01-01', value: 100 },
        { date: '2024-02-01', value: 150 },
        { date: '2024-03-01', value: 200 },
        { date: '2024-04-01', value: 180 },
        { date: '2024-05-01', value: 220 }
    ];

    // Extract dates and values from data
    var dates = shoppingTrendData.map(item => item.date);
    var values = shoppingTrendData.map(item => item.value);

    // Generate the Highcharts line chart
    Highcharts.chart('shoppingTrendChart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Shopping Trends'
        },
        xAxis: {
            categories: dates,
            title: {
                text: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Sales'
            }
        },
        series: [{
            name: 'Sales',
            data: values
        }]
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>



</html>
