function generateModal(opt) {

    var content = opt.content;
    var footer = opt.footer;
    var cssClass = opt.cssClass || [];

    var default_footer = [
        {
            label: 'Button Label',
            className: 'tingle-btn tingle-btn--primary',
            callback: function (modal) {
                return function () {
                    modal.close();
                }
            }
        },
        {
            label: 'Dangerous action !',
            className: 'tingle-btn tingle-btn--danger',
            callback: function (modal) {
                return function () {
                    modal.close();
                }
            }
        }
    ];

    // instanciate new modal
    var modal = new tingle.modal({
        footer: true,
        stickyFooter: false,
        closeMethods: ['overlay', 'button', 'escape'],
        closeLabel: "Close",
        cssClass: cssClass,
        onOpen: function () {
            console.log('modal open');
        },
        onClose: function () {
            console.log('modal closed');
        },
        beforeClose: function () {
            // here's goes some logic
            // e.g. save content before closing the modal
            return true; // close the modal
            return false; // nothing happens
        }
    });

    // set content
    modal.setContent(content);

    var renderfooter = [];
    if (!footer || footer.length < 1) {
        renderfooter = default_footer;
    } else {
        renderfooter = footer;
    }

    renderfooter.map(function (item) {
        modal.addFooterBtn(item.label, item.className, item.callback(modal));
    })

    return modal;
}
