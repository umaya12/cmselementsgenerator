
         // <plugin root>/src/Resources/app/administration/src/module/sw-cms/elements/testing/index.js
         Shopware.Service('cmsService').registerCmsElement({
             name: 'testing',
             label: 'sw-cms.elements.customDailymotionElement.label',
             component: 'sw-cms-el-dailymotion',
             configComponent: 'sw-cms-el-config-testing/index.js',
             previewComponent: 'sw-cms-el-preview-testing/index.js',
             defaultConfig: {
                 dailyUrl: {
                     source: 'static',
                     value: ''
                 }
             }
         });
         