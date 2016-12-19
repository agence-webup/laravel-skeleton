var cartVue = new Vue({
    el: '[data-js=orderVue]',
    data: {
        diffAddress:false,
        deliveryLastname: "",
        deliveryFirstname: "",
        deliveryPhone: "",
        deliveryEmail: "",
        deliveryAddress: "",
        deliveryAddress2: "",
        deliveryPostalcode: "",
        deliveryCity: "",
        billingFirstname: "",
        billingLastname: "",
        billingEmail: "",
        billingPhone: "",
        billingAddress: "",
        billingAddress2: "",
        billingPostalcode: "",
        billingCity: ""
    },
    watch: {
        deliveryLastname: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingLastname = val;
            }
        },
        deliveryFirstname: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingFirstname = val;
            }
        },
        deliveryPhone: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingPhone = val;
            }
        },
        deliveryEmail: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingEmail = val;
            }
        },
        deliveryAddress: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingAddress = val;
            }
        },
        deliveryAddress2: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingAddress2 = val;
            }
        },
        deliveryPostalcode: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingPostalcode = val;
            }
        },
        deliveryCity: function (val, oldVal) {
            if (!this.diffAddress) {
                this.billingCity = val;
            }
        }
    },
    created: function () {
        // prefill input fields with existing values (because of Vue 2...)
        this.deliveryLastname = document.querySelector('input[name="deliveryLastname"]').value;
        this.deliveryFirstname = document.querySelector('input[name="deliveryFirstname"]').value;
        this.deliveryPhone = document.querySelector('input[name="deliveryPhone"]').value;
        this.deliveryEmail = document.querySelector('input[name="deliveryEmail"]').value;
        this.deliveryAddress = document.querySelector('input[name="deliveryAddress"]').value;
        this.deliveryPostalcode = document.querySelector('input[name="deliveryPostalcode"]').value;
        this.deliveryCity = document.querySelector('input[name="deliveryCity"]').value;
    }
});
