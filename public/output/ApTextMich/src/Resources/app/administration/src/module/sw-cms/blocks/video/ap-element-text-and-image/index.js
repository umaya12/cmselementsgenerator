import './component';
import './config';
import './preview';
Shopware.Service('cmsService').registerCmsElement({
    name: 'ap-element-text-and-image',
    label: 'ap.cms.elements.ImageText.label',
    component: 'sw-cms-el-component-ap-element-text-and-image',
    configComponent: 'sw-cms-el-config-ap-element-text-and-image',
    previewComponent: 'sw-cms-el-preview-ap-element-text-and-image',
    defaultConfig:{ 
            title:{
            source:'static',
            value:'',
            required:true
        },

            content:{
            source:'static',
            value:'',
            required:false
        },

            headimage:{
            source:'static',
            value:'',
            required:false
        },

            secondary image:{
            source:'static',
            value:'',
            required:false
        },

            itsOpen:{
            source:'static',
            value:'false',
            required:false
        },

            isHover:{
            source:'static',
            value:'false',
            required:true
        },

            headlineColor:{
            source:'static',
            value:'',
            required:true
        },
}});