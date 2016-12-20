let ProductModal = (function() {

    class ProductModal {

        constructor(options) {
            this.productId = options.productId;
            this.cartLink = options.cartLink;
            this.modalButtons = document.querySelectorAll('[data-js=productButton]');
            this.initModal();
            this.bindEvents();
            this.cartService = new CartService(Laravel.cartUrl, Laravel.csrfToken);
        }

        initModal() {
            this.modal = new tingle.modal({
                footer: true
            });

            this.modal.setContent(document.querySelector('[data-js=productModal]'));

            this.modal.addFooterBtn('Continuer mes achats', 'tingle-btn tingle-btn--pull-left tingle-btn--secondary', () => {
                const quantity = document.querySelector('[name=productQuantity]').value;
                this.cartService.add(this.productId, quantity).then((cart) => {
                    this.modal.close();
                });
            });
            this.modal.addFooterBtn('Voir mon panier', 'tingle-btn tingle-btn--pull-right tingle-btn--primary', () => {
                const quantity = document.querySelector('[name=productQuantity]').value;
                this.cartService.add(this.productId, quantity).then((cart) => {
                    window.location = this.cartLink;
                });
            });
        }

        bindEvents() {
            this.modalButtons.forEach((element) => {
                element.addEventListener('click', (event) => {
                    event.preventDefault();
                    this.modal.open();
                });
            });
        }
    }

    return ProductModal;

})();
