const span_active = document.querySelector('.start_span_active');
var search = document.querySelector('#search');
var results = document.querySelector('#searchresults');
var templateContent = document.querySelector('#resultstemplate').content;


search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var clonedOptions = templateContent.cloneNode(true);
    var set = Array.prototype.reduce.call(clonedOptions.children, function searchFilter(frag, el) {
        if (inputVal.test(el.textContent) && frag.children.length < 5) frag.appendChild(el);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});


    function auto_effect() {
        if(span_active.className == 'start_span_active') {
            span_active.classList.toggle('start_span');
            span_active.classList.toggle('start_span_active');
        } else if (span_active.className == 'start_span') {
            span_active.classList.toggle('start_span');
            span_active.classList.toggle('start_span_active');
}
    }
    setInterval(auto_effect, 500);