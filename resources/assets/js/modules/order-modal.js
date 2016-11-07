(function() {
    function init() {
        var modal = new tingle.modal({});
        modal.setContent(document.querySelector('[data-js=orderModal]'));

        document.querySelector('[data-js=orderButton]').addEventListener('click', function(event) {
            // if not logged
            if (this.getAttribute('data-open') == '1') {
                event.preventDefault();
                modal.open();
            }
        })
    }

    init();
})();
