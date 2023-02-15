const Tooltip = {
    bind(el, binding) {
        let tooltip = new bootstrap.Tooltip(el, {
            title: binding.value,
            placement: binding.arg || 'auto',
            container: 'body',
            trigger: 'hover',
            delay: {
                show: 1000,
                hide: 0
            }
        });
        el.addEventListener('mouseleave', function() {
            tooltip.hide();
        })
    },
    unbind(el) {
        bootstrap.Tooltip.getInstance(el).dispose();
    }
}

export default Tooltip;
