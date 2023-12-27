import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "dsfhsdfh",
    "label": "ap.cms.blocks..label",
    "category": "text",
    "component": "sw-cms-block-dsfhsdfh",
    "previewComponent": "sw-cms-preview-dsfhsdfh",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "dsfhdf": "dsfhdf"
    }
});