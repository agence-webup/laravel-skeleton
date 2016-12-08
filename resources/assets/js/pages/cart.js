var cartService = new CartService(Laravel.cartUrl, Laravel.csrfToken);

var cartVue = new Vue({
    el: '[data-js=cartVue]',
    data: {
        cart: {}
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
        update: function(item) {
            cartService.update(item.id, item.quantity).then((cart) => {
                this.get();
            });
        },
        remove: function(item) {
            cartService.remove(item.id).then((cart) => {
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
