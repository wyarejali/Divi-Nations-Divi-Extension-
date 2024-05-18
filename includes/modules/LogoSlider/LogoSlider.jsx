import React, { Component } from 'react';
import '../../../public/css/dina-slick.css';
import './styles.css';

import Slider from 'react-slick';
import {
    checkOnOffOption,
    renderIconStyle,
    setResponsiveCSS,
} from '../DiviNationsCore/DivinationsCore';

// Custom arrow
class PrevArrow extends Component {
    render() {
        const { className, style, onClick, icon } = this.props;

        return (
            <button
                className={`${className} dina_slider_icon dina_prev_icon`}
                onClick={onClick}
                style={{ ...style, display: 'block' }}
            >
                <i className="dina_icon">{icon}</i>
            </button>
        );
    }
}
class NextArrow extends Component {
    render() {
        const { className, style, onClick, icon } = this.props;

        return (
            <button
                className={`${className} dina_slider_icon dina_next_icon`}
                onClick={onClick}
                style={{ ...style, display: 'block' }}
            >
                <i className="dina_icon">{icon}</i>
            </button>
        );
    }
}

class LogoSlider extends Component {
    static slug = 'dina_logo_slider';

    static css(props) {
        const additionalCss = [];

        const iconStyle = renderIconStyle(
            props,
            'prev_icon',
            '%%order_class%% .dina_slider_icon i.dina_icon'
        );

        additionalCss.push([
            {
                selector: `%%order_class%% .slick-list`,
                declaration: `
                    margin: 0 -${props.space_between};
                `,
            },
            {
                selector: `%%order_class%% .slick-list .slick-slide > div`,
                declaration: `
                    margin: 0 ${props.space_between};
                `,
            },
        ]);

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dina_slider_icon i.dina_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dina_slider_icon i.dina_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dina_slider_icon',
                optionName: 'icon_margin',
                property: 'margin',
            },
        ]);

        return additionalCss.concat(iconStyle).concat(responsiveCss);
    }

    // Arrows icon
    render_prev_icon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.prev_icon);

        return Icon;
    };

    render_next_icon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.next_icon);

        return Icon;
    };

    render() {
        const settings = {
            dots: checkOnOffOption(this.props.is_dots),
            arrows: checkOnOffOption(this.props.is_arrows),
            autoplay: checkOnOffOption(this.props.autoplay),
            autoplaySpeed: parseInt(this.props.autoplay_delay),
            centerMode: checkOnOffOption(this.props.centered_mode),
            centerPadding: '50px',
            draggable: checkOnOffOption(this.props.is_grab),
            easing: 'linear',
            infinite: checkOnOffOption(this.props.loop),
            slidesToScroll: 1,
            slidesToShow: 3,
            speed: parseInt(this.props.slider_speed),
            vertical: false,
            prevArrow: <PrevArrow icon={this.render_prev_icon()} />,
            nextArrow: <NextArrow icon={this.render_next_icon()} />,
            reponsive: [
                {
                    breakpoint: 980,
                    settings: {},
                },
                {
                    breakpoint: 767,
                    settings: {},
                },
            ],
        };

        let classes = ['dina_logo_slider-container'];

        if (this.props.arrow_show_on_hover === 'on') {
            classes.push('show-arrow-on-hover');
        }

        return (
            <Slider {...settings} className={classes.join(' ')}>
                {this.props.content}
            </Slider>
        );
    }
}

export default LogoSlider;
