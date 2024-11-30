document.addEventListener('DOMContentLoaded', () => {
    const btnAddCart = document.querySelectorAll(".add-to-cart"); // Use querySelectorAll for multiple elements
    const cartItemCount = document.querySelector(".cart-icon span");
    const cartItemList = document.querySelector(".cart-items");
    const cartItemTotal = document.querySelector(".cart-total");
    const cartIcon = document.querySelector(".cart-icon");
    const sidebar = document.querySelector('.sidebar'); 
    const closeBtn = document.querySelector(".sidebar-close");

    if (!cartIcon) {
        console.error("Cart icon not found.");
    } else {
        console.log("Cart icon found.");
    }

    if (!sidebar) {
        console.error("Sidebar not found.");
    } else {
        console.log("Sidebar found.");
    }

    // Toggle the sidebar on cart icon click
    cartIcon.addEventListener('click', () => {
        console.log("Cart icon clicked.");
        sidebar.classList.toggle('open'); // Toggle the 'open' class on the sidebar
    });

    // Close the sidebar on close button click
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            console.log("Sidebar close button clicked.");
            sidebar.classList.remove('open'); // Remove the 'open' class
        });
    }


    // Handle Add to Cart buttons
    let cartItems = [];
    let total = 0;

    if (btnAddCart.length > 0) {
        btnAddCart.forEach((button, index) => {
            button.addEventListener('click', () => {
                const item = {
                    name: document.querySelectorAll('.item')[index].textContent,
                    price: parseFloat(
                        document.querySelectorAll('.food-price')[index].textContent.slice(1)
                    ),
                    quantity: 1,
                };

                const existingItem = cartItems.find(cartItem => cartItem.name === item.name);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cartItems.push(item);
                }

                total += item.price;
                updateCartUI();
            });
        });
    } else {
        console.error("No .add-to-cart buttons found in the DOM.");
    }

    function updateCartUI() {
        updateCartItemCount(cartItems.length);
        updateCartItemList();
        updateCartTotal();
    }

    function updateCartItemCount(count) {
        cartItemCount.textContent = count;
    }

    function updateCartItemList() {
        cartItemList.innerHTML = "";
        cartItems.forEach((item, index) => {
            const cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.innerHTML = `
                <span>(${item.quantity}x) ${item.name}</span>
                <span>$${(item.price * item.quantity).toFixed(2)}</span>
                <button class="rmv" data-index="${index}"><i class="fa-solid fa-times"></i></button>
            `;
            cartItemList.append(cartItem);
        });
    }

    function updateCartTotal() {
        cartItemTotal.textContent = `$${total.toFixed(2)}`;
    }
});
  