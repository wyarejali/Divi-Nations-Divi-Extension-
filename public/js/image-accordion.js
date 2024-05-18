window.onload = () => {
    const accordionsContainers = document.querySelectorAll(
        '.dina_image_accordion-container'
    );

    accordionsContainers.forEach((container, i) => {
        const settings = JSON.parse(container.dataset.settings);

        const accordions = container.querySelectorAll(
            '.dina_image_accordion-item'
        );

        // Active first item
        if (settings.isFirstItemActive) {
            accordions.forEach((item, i) => {
                if (i === 0) {
                    item.classList.add('active-item');
                }
            });
        }

        function activeItemMethod(e) {
            accordions.forEach((el) => el.classList.remove('active-item'));
            this.classList.add('active-item');
        }

        // On hover handle
        if (settings.eventType === 'hover') {
            accordions.forEach((item) => {
                item.addEventListener('mouseenter', activeItemMethod);
            });
        }

        // On click handle
        if (settings.eventType === 'click') {
            accordions.forEach((item) => {
                item.addEventListener('click', activeItemMethod);
            });
        }
    });
};
