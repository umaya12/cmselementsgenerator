import template from './cms-element-config-mki-muhammad-kassem-ismail.html.twig';
import './cms-element-config-mki-muhammad-kassem-ismail.scss';

const {Component, Mixin} = Shopware;

Component.register("sw-cms-el-config-mki-muhammad-kassem-ismail",{
    template,
    mixins: [
        Mixin.getByName('cms-element')
    ],

    data() {
        return {
 
        };
    },
    computed:{
 
    },
    created(){
        this.createdComponent();
    },
    methods:{
        createdComponent() {
            this.initElementConfig('mki-muhammad-kassem-ismail');
        },
        emitChanges() {
            this.$emit\('element-update', this.element);

        },
    }

})