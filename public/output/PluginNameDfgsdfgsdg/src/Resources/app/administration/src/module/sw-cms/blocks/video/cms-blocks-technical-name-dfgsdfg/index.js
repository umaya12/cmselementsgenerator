import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "cms-blocks-technical-name-dfgsdfg",
    "label": "ap.cms.blocks.Blocks Label (DE).label",
    "category": "video",
    "component": "sw-cms-block-cms-blocks-technical-name-dfgsdfg",
    "previewComponent": "sw-cms-preview-cms-blocks-technical-name-dfgsdfg",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "mk-cms-element": "mk-cms-element"
    }
});