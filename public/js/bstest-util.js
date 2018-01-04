alertify.defaults = {
    // dialogs defaults
    autoReset: true,
    basic: false,
    closable: false,
    closableByDimmer: true,
    frameless: false,
    maintainFocus: true, // <== global default not per instance, applies to all dialogs
    maximizable: true,
    modal: true,
    movable: true,
    moveBounded: true,
    overflow: true,
    padding: true,
    pinnable: false,
    pinned: true,
    preventBodyShift: false, // <== global default not per instance, applies to all dialogs
    resizable: true,
    startMaximized: false,
    transition: 'zoom',

    // notifier defaults
    notifier: {
        // auto-dismiss wait time (in seconds)
        delay: 3,
        // default position
        position: 'bottom-right',
        // adds a close button to notifier messages
        closeButton: false
    },

    // language resources
    glossary: {
        // dialogs default title
        title: 'Praxis',
        // ok button text
        ok: 'OK',
        // cancel button text
        cancel: 'Cancel'
    },

// theme settings
    theme: {
        // class name attached to prompt dialog input textbox.
        input: 'ajs-input',
        // class name attached to ok button
        ok:
            'ajs-ok',
        // class name attached to cancel button
        cancel:
            'ajs-cancel'
    }
};
