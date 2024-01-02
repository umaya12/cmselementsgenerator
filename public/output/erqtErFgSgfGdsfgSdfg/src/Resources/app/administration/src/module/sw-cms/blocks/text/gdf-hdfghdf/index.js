import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    "name": "gdf-hdfghdf",
    "label": "ap.cms.blocks. ghdf.label",
    "category": "text",
    "component": "sw-cms-block-gdf-hdfghdf",
    "previewComponent": "sw-cms-preview-gdf-hdfghdf",
    "defaultConfig": {
        "marginBottom": "200px",
        "marginTop": "50px",
        "marginLeft": "0px",
        "marginRight": "0px",
        "sizingMode": "boxed"
    },
    "slots": {
        "d-g-sdfgsdfg-sd": "d-g-sdfgsdfg-sd"
    }
});