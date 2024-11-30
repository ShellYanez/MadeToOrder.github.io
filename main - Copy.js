document.addEventListener('DOMContentLoaded', ()=>
    {
        const btnAddCart = document.querySelector(".add-to-cart");
        const cartItemCount = document.querySelector(".cart-icon span");
        const cartItemList = document.querySelector(".cart-items");
        const cartItemTotal= document.querySelector(".cart-total");
        const cartIcon = document.querySelector(".cart-icon");
        const sidebar = document.querySelector(".sidebar");

        let cartItems= []; 
        let total = 0; 

        btnAddCart.forEach((button, index) => {
            button.addEventListener('click', ()=>{
                const item = {
                    name: document.querySelectorAll('.item')[index].textContent,
                    price: parseFloat(document.querySelectorAll.apply('.food-price')[index].textConten.slice(1),
                ), 
                quantity:1,
                };

                const existingItem = cartItems.find(
                    (cartItem) => cartItem.name === item.name,
                );

                if (existingItem)
                {
                    existingItem.quantity++; 
                }
                else
                {

                    cartItem.push(item); 
                }
                
                totalAmount += item.price; 

                updateCartUI(); 
            });
           
            function updateCartUI()
            {
                updatecartItemCount(cartItems.length); 
                updatecartItemList(); 
                updatecartTotal(); 
            }

            function updatecartItemCount(count)
            {
                cartItemCount.textContent = count;
            }

            function updatecartItemList()
            {
                cartItemList.innerHTML='' 
                cartItems.forEach((item, index) => {

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item', 'individual-cart-item')
                    cartItem.innerHTML=`
                    <span>(${item.quantity}x)${item.name}</span>
                    <span>${(item.price * item.quantity).toFixed(2)}</span>
                    <button class="rmv" data-index="${index}"><i class = "fa-solid fa-times"></i></button>
                    `; 
                });
                    cartItemList.append(cartItems); 
                    const rmvbtn = document.querySelectorAll('.rmv'); 
                    rmvbtn.forEach((button)=>{
                        button.addEventListener('click', (event)=>{
                            const index = event.target.dataset.index; 
                            removeItemCart(); 
                        })
                    })
    
            }
            function removeItemCart(index)
            {
                const rmvItem = cartItem.splice(index, 1)[0]; 
                total -= removeItemCart.price * removeItemCart.quantity; 
                updateCartUI; 
            }

            function updateCartTotal()
            {
                cartItemTotal.textContent=`$${total.toFixed(2)}`
            }

            cartIcon.addEventListener('click', () => {
                sidebar.classList.toggle('.sidebar.open'); 
            }); 

            const closeBtn = document.querySelector('.sidebar-close');
            closeBtn.addEventListener('click', () => {
                sidebar.classList.toggle('.sidebar.open'); 
            }); 
        });

    });