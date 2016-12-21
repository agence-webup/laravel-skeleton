var cartService = new CartService(Laravel.cartUrl, Laravel.csrfToken);

var cartVue = new Vue({
    el: '[data-js=cartVue]',
    data: {
        cart: {
            subtotal: {},
            shippingCost: {},
            total: {},
        },
        couponCode: '',
    },
    created: function() {
        this.get();
    },
    methods: {
        get: function() {
            cartService.get().then((cart) => {
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
        },
        addCoupon: function() {
            cartService.addCoupon(this.couponCode).then((cart) => {
                this.get();
            }).catch((data) => {
                var modal = new tingle.modal({
                    footer: true,
                });

                modal.addFooterBtn('OK', 'tingle-btn tingle-btn--primary', function() {
                    modal.close();
                });

                modal.setContent(data.error);
                modal.open();
            });
        },
        removeCoupon: function(coupon) {
            cartService.removeCoupon(coupon.id).then((cart) => {
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
