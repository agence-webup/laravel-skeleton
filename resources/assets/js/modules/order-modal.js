(function() {
    function init() {
        var modal = new tingle.modal({});
        modal.setContent(document.querySelector('[data-js=orderModal]'));

        Array.prototype.forEach.call(document.querySelectorAll('[data-js=orderButton]'), function(el) {
            el.addEventListener('click', function(event) {
                // if not logged
                if (this.getAttribute('data-open') == '1') {
                    event.preventDefault();
                    modal.open();
                }
            });
        })


    }

    init();
})();
