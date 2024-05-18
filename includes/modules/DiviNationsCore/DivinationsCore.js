export const setMarginPadding = (
    property = 'margin',
    values = '0|0|0|0',
    important
) => {
    if (values) {
        const css = values.split('|');

        let top = '',
            right = '',
            bottom = '',
            left = '';

        if (Array.isArray(css)) {
            top = `${property}-top: ${css[0]} ${important};`;
            right = `${property}-right: ${css[1]} ${important};`;
            bottom = `${property}-bottom: ${css[2]} ${important};`;
            left = `${property}-left: ${css[3]} ${important};`;
        }

        return `${top} ${right} ${bottom} ${left}`;
    }
};

export const conditionalResponsiveCSS = (property, cssValue, important) => {
    if (property === 'margin' || property === 'padding') {
        return setMarginPadding(property, cssValue, important);
    } else {
        return `${property}: ${cssValue} ${important};`;
    }
};

export const checkHoverEnable = (props, optionName) => {
    let isHover = props[optionName + '__hover_enabled']
        ? props[optionName + '__hover_enabled'].split('|')
        : [];

    console.log(isHover[0]);
};

/**
 *
 */
export const setResponsiveCSS = (props, styles = []) => {
    let additionalCss = [];

    styles.forEach((style) => {
        let selector = style.selector,
            hoverSelector = style.hoverSelector ? style.hoverSelector : '',
            important = style.important ? '!important' : '',
            defaultCss = style.defaultCss ? style.defaultCss : '',
            cssValue = props[style.optionName],
            property = style.property,
            tabletCssValue = props[style.optionName + '_tablet'],
            phoneCssValue = props[style.optionName + '_phone'],
            last_edited_option = props[style.optionName + '_last_edited'],
            isEnabled =
                last_edited_option && last_edited_option.startsWith('on'),
            isHover = props.hover_enabled === 1 ? true : false,
            hoverCssValue = props[style.optionName + '__hover'];

        // If default css declared
        if (defaultCss !== '') {
            additionalCss.push([
                {
                    selector,
                    declaration: defaultCss,
                },
            ]);
        }

        if (property) {
            additionalCss.push([
                {
                    selector,
                    declaration: conditionalResponsiveCSS(
                        property,
                        cssValue,
                        important
                    ),
                },
            ]);
        }

        if (isHover && hoverCssValue) {
            additionalCss.push([
                {
                    hoverSelector,
                    declaration: conditionalResponsiveCSS(
                        property,
                        hoverCssValue,
                        important
                    ),
                },
            ]);

            console.log(additionalCss, isHover, hoverCssValue);
        }

        // Is responsive style on
        if (isEnabled) {
            if (tabletCssValue) {
                additionalCss.push([
                    {
                        selector,
                        device: 'tablet',
                        declaration: conditionalResponsiveCSS(
                            property,
                            tabletCssValue,
                            important
                        ),
                    },
                ]);
            }

            if (phoneCssValue) {
                additionalCss.push([
                    {
                        selector,
                        device: 'phone',
                        declaration: conditionalResponsiveCSS(
                            property,
                            phoneCssValue,
                            important
                        ),
                    },
                ]);
            }
        }
    });

    // Finally Return the css
    return additionalCss;
    // console.log(styles);
};

export const renderIconStyle = (props, option_name, selector) => {
    if (props[option_name]) {
        let fontFamily = {
                divi: 'ETmodules !important',
                fa: 'FontAwesome!important',
            },
            icon = props[option_name] ? props[option_name].split('|') : [],
            additionalCss = [];

        additionalCss.push([
            {
                selector,
                declaration: `
                font-family: ${fontFamily[icon[2]]};
                font-weight: ${icon[4]}!important;`,
            },
        ]);
        return additionalCss;
    }

    return [];
};

export const dinaGetCustomBgCSS = (
    props,
    opt_name,
    selector,
    hover_selector,
    default_color
) => {
    let opt_prefix = opt_name + '_',
        bgStyle = '',
        bgImageStyle = [],
        additionalCss = [],
        isGradient,
        isBgOverlays;

    // Gradient background color
    isGradient =
        props[opt_prefix + 'bg_use_color_gradient'] === 'on' ? true : false;

    // Is overlay
    isBgOverlays =
        props[opt_prefix + 'bg_color_gradient_overlays_image'] === 'on'
            ? true
            : false;

    // If use gradient color then store properties to bgImageStyle
    if (isGradient) {
        const gradientType =
            props[opt_prefix + 'bg_color_gradient_type'] === 'circular'
                ? 'radial'
                : props[opt_prefix + 'bg_color_gradient_type'] || 'linear';

        const radialDirection =
            props[opt_prefix + 'bg_color_gradient_direction_radial'] ||
            'center';

        const gradientDirection =
            gradientType === 'linear'
                ? props[opt_prefix + 'bg_color_gradient_direction'] || '180deg'
                : `circle at ${radialDirection}`;

        const gradientStops =
            props[opt_prefix + 'bg_color_gradient_stops'] &&
            props[opt_prefix + 'bg_color_gradient_stops'].split('|').join(',');

        const repeatGradient = props[opt_prefix + 'bg_color_gradient_repeat'];

        const gradientCSS = `${
            repeatGradient === 'on' ? 'repeating-' : ''
        }${gradientType}-gradient(${gradientDirection}, ${gradientStops})`;

        // Store the gradient css into bgImageStyle
        bgImageStyle.push(gradientCSS);
    }

    // Background image
    const bgImageUrl = props[opt_prefix + 'bg_image'] || '';
    const parallax = props[opt_prefix + 'bg_parallax'] || 'off';

    const isBgImageActive = bgImageUrl !== '' && parallax !== 'on';

    if (isBgImageActive) {
        // Background size
        const bgSize = props[opt_prefix + 'bg_size'];
        if (bgSize) {
            bgStyle += `background-size: ${bgSize};`;
        }

        // Background position
        const bgPosition = props[opt_prefix + 'bg_position'];
        if (bgPosition) {
            bgStyle += `background-position: ${bgPosition};`;
        }

        // Background repeat
        const bgRepeat = props[opt_prefix + 'bg_repeat'];
        if (bgRepeat) {
            bgStyle += `background-repeat: ${bgRepeat};`;
        }

        // Background blend mode
        const bgBelndMode = props[opt_prefix + 'bg_blend'];
        if (bgBelndMode) {
            bgStyle += `background-blend-mode: ${bgBelndMode};`;
        }

        const bgImageCSS = `url(${bgImageUrl})`;
        bgImageStyle.push(bgImageCSS);
    }

    if (bgImageStyle !== '') {
        // If overlays on
        if (!isBgOverlays) {
            bgImageStyle = bgImageStyle.reverse();
        }

        bgStyle += `background-image: ${bgImageStyle.join(', ')};`;
    }

    // If no gradient color use background color
    if (!isGradient) {
        const bgOutput = props[opt_prefix + 'bg_color']
            ? props[opt_prefix + 'bg_color']
            : default_color;

        if (bgOutput !== '') {
            bgStyle += `background-color: ${bgOutput};`;
        }
    }

    additionalCss.push([
        {
            selector,
            declaration: bgStyle,
        },
    ]);

    // :TO DO Hover CSS

    // Retrun the style
    return additionalCss;
};

export const checkOnOffOption = (optionName) => {
    return optionName === 'on' ? true : false;
};
