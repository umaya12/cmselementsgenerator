import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "muhammad-kassem-ismail-block",
    "label": "ap.cms.blocks.Blocks Label (DE).label",
    "category": "video",
    "component": "sw-cms-block-muhammad-kassem-ismail-block",
    "previewComponent": "sw-cms-preview-muhammad-kassem-ismail-block",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "mki-muhammad-kassem-ismail": "mki-muhammad-kassem-ismail"
    }
});