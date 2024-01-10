import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "api-image-text",
    "label": "ap.cms.blocks.ApiImageText.label",
    "category": "text-Image",
    "component": "sw-cms-block-api-image-text",
    "previewComponent": "sw-cms-preview-api-image-text",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "MkiCmsElement": "mki-cms-element"
    }
});