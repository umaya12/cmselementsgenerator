import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "dfhdfhvnc-cc",
    "label": "ap.cms.blocks. c.label",
    "category": "text",
    "component": "sw-cms-block-dfhdfhvnc-cc",
    "previewComponent": "sw-cms-preview-dfhdfhvnc-cc",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "dfhf": "dfhf"
    }
});