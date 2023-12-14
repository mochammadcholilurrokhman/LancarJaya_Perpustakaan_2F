            const shoppingCart = document.querySelector('.cart-item');
            document.querySelector('#shopi').onclick = function(e) {
                shoppingCart.classList.toggle('active');
                e.preventDefault();
            };
