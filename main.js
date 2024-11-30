document.addEventListener('DOMContentLoaded', () => {
    const btnAddCart = document.querySelectorAll(".add-to-cart"); // Use querySelectorAll for multiple elements
    const cartItemCount = document.querySelector(".cart-icon span");
    const cartItemList = document.querySelector(".cart-items");
    const cartItemTotal = document.querySelector(".cart-total");
    const cartIcon = document.querySelector(".cart-icon");
    const sidebar = document.querySelector('.sidebar'); 
    const closeBtn = document.querySelector(".sidebar-close");

    // Ensure cart icon and sidebar exist
    if (!cartIcon || !sidebar) {
        console.error("Cart icon or sidebar not found in the DOM.");
        return;
    }

    // Toggle the sidebar
    cartIcon.addEventListener('click', () => {
        console.log("Cart icon clicked.");
        sidebar.classList.toggle('open');
    });

    // Close the sidebar
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            console.log("Sidebar close button clicked.");
            sidebar.classList.remove('open');
        });
    }

    // Cart functionality
    let cartItems = [];
    let total = 0;

    // Add to Cart functionality
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

    // Update the cart UI
    function updateCartUI() {
        updateCartItemCount(cartItems.length);
        updateCartItemList();
        updateCartTotal();
    }

    function updateCartItemCount(count) {
        const totalItems = cartItems.reduce((sum,item)=>sum + item.quantity,0);
        cartItemCount.textContent = totalItems;
    }

    function updateCartItemList() {
        cartItemList.innerHTML = ""; // Clear previous list
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

        // Add event listeners for remove buttons
        const removeButtons = document.querySelectorAll(".rmv");
        removeButtons.forEach(button => {
            button.addEventListener("click", (event) => {
                const index = event.target.closest("button").dataset.index;
                removeItemFromCart(index);
            });
        });
    }

    function removeItemFromCart(index) {
        const removedItem = cartItems.splice(index, 1)[0];
        total -= removedItem.price * removedItem.quantity;
        updateCartUI();
    }

    function updateCartTotal() {
        cartItemTotal.textContent = `$${total.toFixed(2)}`;
    }
});