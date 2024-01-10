import './component';
    import './config';
    import './preview';
    Shopware.Service('cmsService').registerCmsElement({
    name: 'mki-cms-element',
    label: 'ap.cms.elements.MkiCmsElement.label',
    component: 'sw-cms-el-component-mki-cms-element',
    configComponent: 'sw-cms-el-config-mki-cms-element',
    previewComponent: 'sw-cms-el-preview-mki-cms-element',
    defaultConfig:{ 
            image:{
            source:'static',
            value:'',
            required:false
        },

            title:{
            source:'static',
            value:'',
            required:true
        },

            content:{
            source:'static',
            value:'',
            required:true
        },
}});