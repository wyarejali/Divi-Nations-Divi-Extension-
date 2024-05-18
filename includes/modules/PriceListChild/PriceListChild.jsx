import React, { Component } from 'react';
import { renderIconStyle } from '../DiviNationsCore/DivinationsCore';

class PriceListChild extends Component {
    static slug = 'dina_pricelist_item';

    static css(props) {
        const additionalCss = [];
        const iconStyle = renderIconStyle(
            props,
            'icon',
            '%%order_class%% .dina_pricelist-icon i.dina_icon'
        );

        return additionalCss.concat(iconStyle);
    }

    renderIcon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.icon);

        return (
            <div className="dina_pricelist-icon">
                <i className="dina_icon">{Icon}</i>
            </div>
        );
    };

    renderImage = () => {
        return (
            <div className="dina_pricelist-image-wrapper">
                <div className="dina_pricelist-image">
                    <img
                        src={`${this.props.image}`}
                        alt={`${this.props.image_alt}`}
                    />
                </div>
            </div>
        );
    };

    renderMedia = () => {
        const mediaType = this.props.media_type;

        if (mediaType === 'image') {
            return this.renderImage();
        }

        if (mediaType === 'icon') {
            return this.renderIcon();
        }
    };

    renderMCE = (description) => {
        if (description) {
            if (this.props.dynamic.description.value) {
                return (
                    <div className="dina_pricelist-description">
                        {this.props.dynamic.description.render()}
                    </div>
                );
            } else {
                return (
                    <div
                        className="dina_pricelist-description"
                        dangerouslySetInnerHTML={{ __html: description }}
                    ></div>
                );
            }
        }
    };

    render_title = () => {
        const heading = this.props.title;
        const Title = this.props.title_level ? this.props.title_level : 'h4';

        return <Title className="dina_pricelist-title">{heading}</Title>;
    };

    render_price = () => {
        const heading = this.props.price;
        const Title = this.props.price_level ? this.props.price_level : 'h4';

        return <Title className="dina_pricelist-price">{heading}</Title>;
    };

    render() {
        return (
            <div className="dina_pricelist-item-wrapper">
                {this.renderMedia()}
                <div className="dina_pricelist-content">
                    <div className={`dina_pricelist-heading`}>
                        {this.render_title()}
                        <div className="dina_pricelist-divider"></div>
                        {this.render_price()}
                    </div>

                    {this.renderMCE(this.props.description)}
                </div>
            </div>
        );
    }
}

export default PriceListChild;
