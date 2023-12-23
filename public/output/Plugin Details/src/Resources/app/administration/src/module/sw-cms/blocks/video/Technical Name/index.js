import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "Technical Name",
    "label": "ap.cms.blocks.tgdhd.label",
    "category": "video",
    "component": "sw-cms-block-Technical Name",
    "previewComponent": "sw-cms-preview-Technical Name",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "Technical Name": "Technical Name"
    }
});