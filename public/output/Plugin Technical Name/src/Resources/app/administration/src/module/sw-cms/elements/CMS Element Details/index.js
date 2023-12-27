import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "CMS Element Details",
    "label": "ap.cms.blocks..label",
    "category": "text-image",
    "component": "sw-cms-block-CMS Element Details",
    "previewComponent": "sw-cms-preview-CMS Element Details",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "CMS Element Details": "CMS Element Details"
    }
});