const Tooltip = {
    bind(el, binding) {
        let tooltip = new bootstrap.Tooltip(el, {
            title: binding.value,
            placement: binding.arg,
            container: 'body',
            trigger: 'hover'
        });
        el.addEventListener('mouseleave', function() {
            tooltip.hide();
        })
    },
    unbind(el) {
        console.log(bootstrap.Tooltip.getInstance(el).dispose());
    }
}

export default Tooltip;
