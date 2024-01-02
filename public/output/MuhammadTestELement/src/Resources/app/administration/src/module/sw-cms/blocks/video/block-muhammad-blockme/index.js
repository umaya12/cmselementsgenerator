import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "block-muhammad-blockme",
    "label": "ap.cms.blocks.Blocks Label (DE).label",
    "category": "video",
    "component": "sw-cms-block-block-muhammad-blockme",
    "previewComponent": "sw-cms-preview-block-muhammad-blockme",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "mk-muhammad-element": "mk-muhammad-element"
    }
});