let ProductModal = (function() {

    class ProductModal {

        constructor(options) {

            this.cartLink = options.cartLink;
            this.modalOpen;
            this.modalButtons = document.querySelectorAll('[data-js=productButton]');
            this.initModal();
            this.bindEvents();
        }

        initModal() {

            this.modal = new tingle.modal({
                onClose: function() {
                    this.modalOpen = null;
                },
                footer: true
            });

            this.modal.setContent(document.querySelector('[data-js=productModal]'));

            this.modal.addFooterBtn('Continuer mes achats', 'tingle-btn tingle-btn--pull-left tingle-btn--secondary', () => {
                this.modal.close();
            });
            this.modal.addFooterBtn('Voir mon panier', 'tingle-btn tingle-btn--pull-right tingle-btn--primary', () => {
                console.log(this.cartLink);
                this.modal.close();
            });
        }

        bindEvents() {
            this.modalButtons.forEach((element) => {
                element.addEventListener('click', (event) => {
                    event.preventDefault();
                    if(!this.modalOpen) {
                        this.modal.open();
                        this.modalOpen = true;
                    }
                });
            });
        }
    }

    return ProductModal;

})();
