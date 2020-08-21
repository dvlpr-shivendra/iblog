import ClipboardJS from 'clipboard/dist/clipboard.min.js';

const clipboard = new ClipboardJS('.copy-btn')

clipboard.on('success', function(e) {
    e.trigger.setAttribute('data-tooltip', 'copied');

    setTimeout(() => {
        e.clearSelection();
        e.trigger.setAttribute('data-tooltip', 'click to copy');
    }, 2000);
});

document.querySelectorAll('pre').forEach((preBlock, index) => {
    preBlock.id = `pre-${index}`;
    const copyButton = document.createElement('button');
    copyButton.classList.add('copy-btn');
    copyButton.innerText = "copy";
    copyButton.setAttribute('data-clipboard-target', `#pre-${index}`)
    copyButton.setAttribute('data-tooltip', `click to copy`)
    preBlock.insertAdjacentElement('afterEnd', copyButton);
})