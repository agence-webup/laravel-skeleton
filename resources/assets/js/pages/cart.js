var cartService = new CartService(Laravel.cartUrl, Laravel.csrfToken);

var cartVue = new Vue({
    el: '[data-js=cartVue]',
    data: {
        cart: {},
        couponCode: '',
    },
    created: function() {
        this.get();
    },
    methods: {
        get: function() {
            cartService.get().then((cart) => {
                console.log(this);
                Vue.set(this, 'cart', cart);
            });
        },
        update: function(product) {
            cartService.update(product.id, product.quantity).then((cart) => {
                this.get();
            });
        },
        remove: function(product) {
            cartService.remove(product.id).then((cart) => {
                this.get();
            });
        }
    },
    filters: {
        price: function(value) {
            return typeof value == 'number' ? value.toFixed(2) + '€' : '';
        }
    }
});
