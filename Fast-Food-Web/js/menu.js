document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');

    if (categoryParam) {
        // Delay execution by a small interval to ensure category elements are fully rendered
        setTimeout(() => {
            // Simulate a click on the corresponding category
            const categoryElement = document.querySelector(`.category-name[data-category-id="${categoryParam}"]`);

            if (categoryElement) {
                categoryElement.click();
            }
        }, 1);
    }

    const categoryElements = document.querySelectorAll('.category-name');
    // Event listener for category elements
    categoryElements.forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.stopPropagation();
            // Remove highlight from all elements
            categoryElements.forEach(function(el) {
                el.classList.remove('highlight-border');
            });
            // Add highlight to the clicked element
            this.classList.add('highlight-border');

            // Fetch product data for the selected category
            const categoryId = this.dataset.categoryId;
            fetchProducts(categoryId);
        });
    });
});


function fetchProducts(categoryId) {
    fetch('menu/get_products.php?categoryId=' + categoryId)
        .then(response => response.json())
        .then(data => {
            updateProductDisplay(data);
        })
        .catch(error => console.error('Error fetching products:', error));
}

function updateProductDisplay(products) {
    const productList = document.getElementById('product-list');
    // Clear existing product list
    productList.innerHTML = '';

    // Iterate over each product in the parsed data
    products.forEach(product => {
        // Create a new product element
        const productElement = document.createElement('div');
        productElement.classList.add('col-sm-6', 'col-md-3', 'col-lg-2', 'product-details');
        productElement.innerHTML = `
            <div class="product-content">
                <img src="./images/${product.category_id}/${product.img}" alt="${product.title}" class="product-img"> 
                <div class="text-container">
                    <h4>${product.title}</h4>
                    <h5>${product.thumbnail}</h5>
                    <h3>${product.price}</h3>
                </div>
                <button class="btn">Đặt ngay</button>
            </div>
        `;
        // Append the product element to the product list
        productList.appendChild(productElement);
    });
}



