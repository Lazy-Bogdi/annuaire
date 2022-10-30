const span_active = document.querySelector('.start_span_active');
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