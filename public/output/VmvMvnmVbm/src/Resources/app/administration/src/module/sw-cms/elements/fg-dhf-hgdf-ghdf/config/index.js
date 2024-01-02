import template from './cms-element-config-fg-dhf-hgdf-ghdf.html.twig';
import './cms-element-config-fg-dhf-hgdf-ghdf.scss';

const {Component, Mixin} = Shopware;

Component.register("sw-cms-el-config-fg-dhf-hgdf-ghdf",{
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
            this.initElementConfig('fg-dhf-hgdf-ghdf');
        },
        emitChanges() {
            this.$emit('element-update', this.element);
        },

    }
})