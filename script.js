let cart = document.querySelector('.cart'); 
let close= document.querySelector('.close'); 
let body = document.querySelector('body'); 

cart.addEventListener('click', () =>{
    body.classList.toggle('showCart')
})


closecart.addEventListener('click', () =>{
    body.classList.toggle('showCart')
})

/*CSS for shopping Cart
.myCart-Tab
{
    top: 0; 
    right: 0; 
    bottom: 0; 
    background-color:  rgb(229, 229, 5);
    color: green;
    width:400px;

}


<div class="myCart-Tab">
    <h1>My Cart</h1>
    <div class="cartList">

    </div>

    <div class = "btnCart">
        <button class = "close">Close</button>
        <button class = "checkout">Checkout</button>


    </div>


</div>*/