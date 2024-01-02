<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwMediaUploadV2
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-cms-mapping-field
                v-model="element.config.$fieldTechnicalName"
                :label="\$tc('sw-cms.elements.image.label')"
                value-types="entity"
                entity="media"
        >
            <sw-media-upload-v2
                variant="regular"
                :upload-tag="uploadTag"
                :source="previewSource"
                :allow-multi-select="false"
                 :default-folder="cmsPageState.$fieldTechnicalName"
                :caption="\$tc('sw-cms.elements.general.config.caption.mediaUpload')"
                @media-upload-sidebar-open="onOpenMediaModal"
                @media-upload-remove-image="onImageRemove"
            />
            <sw-upload-listener
                :upload-tag="uploadTag"
                auto-upload
                @media-upload-finish="onImageUpload"
            />
        
            <sw-media-modal-v2
                v-if="mediaModalIsOpen"
                variant="regular"
                :caption="\$tc('sw-cms.elements.general.config.caption.mediaUpload')"
                :entity-context="cmsPageState.$fieldTechnicalName"
                :allow-multi-select="false"
                :initial-folder-id="cmsPageState.defaultMediaFolderId"
                @media-upload-remove-image="onImageRemove"
                @media-modal-selection-change="onSelectionChanges"
                @modal-close="onCloseModal"
            >
            </sw-media-modal-v2>
        
        </sw-cms-mapping-field>
EOT;
    }

    public function getContentMethodsConfigIndexjs($fieldTechnicalName):string{

        $content=<<<EOT
        async onImageUpload({ targetId }) {
            const mediaEntity = await this.mediaRepository.get(targetId);
            this.element.config.{$fieldTechnicalName}.value = mediaEntity.id;
            this.updateElementData(mediaEntity);
            this.\$emit('element-update', this.element);
        },
        updateElementData(media = null) {
            const mediaId = media === null ? null : media.id;
            if (!this.element.data) {
                this.\$set(this.element, 'data', { mediaId });
                this.\$set(this.element, 'data', { media });
            } else {
                this.\$set(this.element.data, 'mediaId', mediaId);
                this.\$set(this.element.data, 'media', media);
            }
        },
        onOpenMediaModal(){
            this.mediaModalIsOpen=true;
        },
        onSelectionChanges(mediaEntity) {
            const media = mediaEntity[0];
            this.element.config.$fieldTechnicalName.value = media.id;
            this.updateElementData(media);
            this.emitChanges();
        },
        onCloseModal(){
            this.mediaModalIsOpen=false;
        },
        onImageRemove(){
            this.element.config.$fieldTechnicalName.value=null;
            this.updateElementData();
            this.emitChanges();
        },
EOT;
    return $content;
    }
    public function getContentComputedConfigIndexjs($fieldTechnicalName):string{
        $content=<<<EOT
         mediaRepository(){
             return this.repositoryFactory.create('media');
         },
         previewSource() {
             if (this.element.data && this.element.data.$fieldTechnicalName && this.element.data.$fieldTechnicalName.id) {
                 return this.element.data.$fieldTechnicalName;
             }else{
                 return this.element.config.$fieldTechnicalName.value;
             }
         },
         uploadTag() {
             return `cms-element-$fieldTechnicalName-config-\${this.element.id}`;
         },
EOT;
        return $content;
    }

}