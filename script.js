let cart = document.querySelector('.cart'); 
let closeCart= document.querySelector('.close'); 
let body = document.querySelector('body'); 

let listProductHTML = querySelectto('.cartList')
cart.addEventListener('click', () =>{
     body.classList.toggle('showCart')
})


closeCart.addEventListener('click', () =>{
    body.classList.toggle('showCart')
})

let listProducts =[]; 

const initApp = () =>
    {
        // fetch gets data from json file
        fetch('products.json')
        then(response => response.jason())
        then(data=>{
            listProducts = data; 
            console.log();
            
        })
    }
    initApp(); 