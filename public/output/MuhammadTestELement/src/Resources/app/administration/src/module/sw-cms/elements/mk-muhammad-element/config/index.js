import template from './cms-element-config-mk-muhammad-element.html.twig';
import './cms-element-config-mk-muhammad-element.scss';

const {Component, Mixin} = Shopware;

Component.register("sw-cms-el-config-mk-muhammad-element",{
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
            this.initElementConfig('mk-muhammad-element');
        },
        emitChanges() {
            this.$emit\('element-update', this.element);

        },
    }

})