window.onload = () => {
    const magnify = () => {
        const containers = document.querySelectorAll(
            '.dina_image_magnifier-container'
        );

        containers.forEach((container) => {
            const image = container.querySelector(
                '.dina_image_magnifier-image'
            );
            const lens = container.querySelector('.dina_image_magnifier-lens');

            const settings = JSON.parse(container.dataset.settings);

            image.addEventListener('mousemove', mouseMove);
            image.addEventListener('resize', mouseMove);
            image.addEventListener('mouseleave', mouseLeave);

            // For touch screen
            image.addEventListener('touchmove', mouseMove);
            image.addEventListener('touchleave', mouseLeave);

            // Lens
            lens.style.width = settings.lensSize;
            lens.style.height = settings.lensSize;
            lens.style.backgroundRepeat = 'no-repeat';

            function mouseMove(e) {
                e.preventDefault();

                const w = lens.offsetWidth / 2;
                const h = lens.offsetHeight / 2;

                const pos = getCursorPos(e);
                const x = Math.max(
                    w / settings.zoomLevel,
                    Math.min(image.width - w / settings.zoomLevel, pos.x)
                );
                const y = Math.max(
                    h / settings.zoomLevel,
                    Math.min(image.height - h / settings.zoomLevel, pos.y)
                );

                // remove px
                const size = settings.lensSize.split('px')[0];

                const top = e.clientY - size / 2;
                const left = e.clientX - size / 2;

                // Show lens on hover update the lens
                lens.style.opacity = '1';
                lens.style.top = top + 'px';
                lens.style.left = left + 'px';
                lens.style.backgroundImage = "url('" + image.src + "')";
                lens.style.backgroundSize =
                    image.width * settings.zoomLevel +
                    'px ' +
                    image.height * settings.zoomLevel +
                    'px';

                lens.style.backgroundPosition =
                    '-' +
                    (x * settings.zoomLevel - w) +
                    'px -' +
                    (y * settings.zoomLevel - h) +
                    'px';
            }

            // Hide on mouse leave from the image
            function mouseLeave() {
                lens.style.opacity = '0';
            }

            // Get the cursor position
            function getCursorPos(e) {
                const a = image.getBoundingClientRect();
                const x = e.pageX - a.left - window.scrollX;
                const y = e.pageY - a.top - window.scrollY;
                return { x: x, y: y };
            }
        });
    };

    magnify();
};
