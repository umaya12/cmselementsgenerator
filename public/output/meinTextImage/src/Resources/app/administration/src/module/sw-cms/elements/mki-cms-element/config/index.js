import template from './cms-element-config-mki-cms-element.html.twig';
import './cms-element-config-mki-cms-element.scss';

const {Component, Mixin} = Shopware;

Component.register("sw-cms-el-config-mki-cms-element",{
    template,
    mixins: [
        Mixin.getByName('cms-element')
    ],

    data() {
        return {
            mediaModalIsOpen: false, 
        };
    },
    computed:{
          mediaRepository(){
             return this.repositoryFactory.create('media');
         },
         previewSource() {
             if (this.element.data && this.element.data.image && this.element.data.image.id) {
                 return this.element.data.image;
             }else{
                 return this.element.config.image.value;
             }
         },
         uploadTag() {
             return `cms-element-image-config-${this.element.id}`;
         },
    },
    created(){
        this.createdComponent();
    },
    methods:{
        createdComponent() {
            this.initElementConfig('mki-cms-element');
        },
        emitChanges() {
            this.$emit('element-update', this.element);
        },
        async onImageUpload({ targetId }) {
            const mediaEntity = await this.mediaRepository.get(targetId);
            this.element.config.image.value = mediaEntity.id;
            this.updateElementData(mediaEntity);
            this.$emit('element-update', this.element);
        },
        updateElementData(media = null) {
            const mediaId = media === null ? null : media.id;
            if (!this.element.data) {
                this.$set(this.element, 'data', { mediaId });
                this.$set(this.element, 'data', { media });
            } else {
                this.$set(this.element.data, 'mediaId', mediaId);
                this.$set(this.element.data, 'media', media);
            }
        },
        onOpenMediaModal(){
            this.mediaModalIsOpen=true;
        },
        onSelectionChanges(mediaEntity) {
            const media = mediaEntity[0];
            this.element.config.image.value = media.id;
            this.updateElementData(media);
            this.emitChanges();
        },
        onCloseModal(){
            this.mediaModalIsOpen=false;
        },
        onImageRemove(){
            this.element.config.image.value=null;
            this.updateElementData();
            this.emitChanges();
        },
    }
})