import './component';
import './config';
import './preview';
Shopware.Service('cmsService').registerCmsElement({
    name: 'fg-dhf-hgdf-ghdf',
    label: 'ap.cms.elements.ImageText.label',
    component: 'sw-cms-el-component-fg-dhf-hgdf-ghdf',
    configComponent: 'sw-cms-el-config-fg-dhf-hgdf-ghdf',
    previewComponent: 'sw-cms-el-preview-fg-dhf-hgdf-ghdf',
    defaultConfig:{ 
            xcyv:{
            source:'static',
            value:'',
            required:false
        },
}});