$('.prod').click(function () {
    $('html, body').animate({
        scrollTop: $('.products').offset().top
    }, 1000);
});

$('.prod').css({
    'cursor': 'pointer'
})

function toggleAnswer(collapseId) {
    const collapseElement = document.getElementById(collapseId);
    const caretIcon = collapseElement.previousElementSibling.querySelector('.faq-caret-icon');

    if (collapseElement.classList.contains('show')) {
        collapseElement.classList.remove('show');
        caretIcon.innerText = '+';
    } else {
        collapseElement.classList.add('show');
        caretIcon.innerText = '-';
    }
}

function addToCart(productName, price) {
    const cartPageUrl = '/orders';
    const productDetails = `?product=${encodeURIComponent(productName)}&price=${encodeURIComponent(price)}`;
    const redirectTo = cartPageUrl + productDetails;
    window.location.href = redirectTo;
}

document.querySelectorAll('.addToCartBtn').forEach(button => {
    button.addEventListener('click', function() {
        const title = this.dataset.title;
        const price = parseFloat(this.dataset.price);
        addToCart(title, price);
    });
});
