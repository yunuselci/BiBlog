import hljs from 'highlight.js';

setTimeout(function () {
    hljs.configure({
       languages: ['php','java','javascript']
    });
    document
        .querySelectorAll('pre')
        .forEach((block) => hljs.highlightElement(block));
}, 100);
