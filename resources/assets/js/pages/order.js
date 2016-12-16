var cartVue = new Vue({
    el: '[data-js=orderVue]',
    data: {
        diffAddress:false,
        deliveryLastname: "",
        deliveryFirstname: "",
        deliveryTelnumber: "",
        deliveryEmail: "",
        deliveryAddress: "",
        deliveryPostcode: "",
        deliveryCity: "",
        lastname: "",
        firstname: "",
        telnumber: "",
        email: "",
        address: "",
        postalcode: "",
        city: ""
    },
    watch: {
        deliveryLastname: function (val, oldVal) {
            if (!this.diffAddress) {
                this.lastname = val;
            }
        },
        deliveryFirstname: function (val, oldVal) {
            if (!this.diffAddress) {
                this.firstname = val;
            }
        },
        deliveryTelnumber: function (val, oldVal) {
            if (!this.diffAddress) {
                this.telnumber = val;
            }
        },
        deliveryEmail: function (val, oldVal) {
            if (!this.diffAddress) {
                this.email = val;
            }
        },
        deliveryAddress: function (val, oldVal) {
            if (!this.diffAddress) {
                this.address = val;
            }
        },
        deliveryPostcode: function (val, oldVal) {
            if (!this.diffAddress) {
                this.postalcode = val;
            }
        },
        deliveryCity: function (val, oldVal) {
            if (!this.diffAddress) {
                this.city = val;
            }
        },
    }
});
