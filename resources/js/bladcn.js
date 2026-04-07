(function () {
    window._bladcnSlots = window._bladcnSlots || [];

    document.addEventListener("alpine:init", () => {
        const helpers = {
            getComponent(id) {
                const el = document.getElementById(id);
                return window._bladcnSlots.includes(el?.dataset?.slot) &&
                el._x_dataStack
                    ? el._x_dataStack[0]
                    : null;
            },

            open(id) {
                const component = this.getComponent(id);
                if (component) {
                    component.open = true;
                }
            },

            close(id) {
                const component = this.getComponent(id);
                if (component) {
                    component.open = false;
                }
            },

            toggle(id) {
                const component = this.getComponent(id);
                if (component) {
                    component.open = !component.open;
                }
            },
        };

        Alpine.magic("bladcn", () => helpers);
    });
})();
