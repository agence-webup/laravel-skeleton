(function() {
    function init() {
        var modalOpen;
        var modal = new tingle.modal({
                onClose: function() {
                    modalOpen = null;
                }
            });
        var modalButtons = document.querySelectorAll('[data-js=paymentButton]');

        modal.setContent(document.querySelector('[data-js=paymentModal]'));

        modalButtons.forEach(function(element) {
            element.addEventListener('click', function(event) {
                document.querySelector('[data-js="validModal"]').setAttribute('href',
                    element.getAttribute('data-url'))
                event.preventDefault();
                modal.open();
                modalOpen = true;
            })
        });
    };

    init();
})();
