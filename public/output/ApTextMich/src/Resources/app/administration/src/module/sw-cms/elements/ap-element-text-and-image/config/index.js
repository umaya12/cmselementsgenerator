import template from './cms-element-config-ap-element-text-and-image.html.twig';
import './cms-element-config-ap-element-text-and-image.scss';

const {Component, Mixin} = Shopware;

Component.register("sw-cms-el-config-ap-element-text-and-image",{
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
            this.initElementConfig('ap-element-text-and-image');
        },
        emitChanges() {
            this.$emit\('element-update', this.element);

        },
    }

})