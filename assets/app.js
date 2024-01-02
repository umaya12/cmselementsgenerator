/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

require('bootstrap');

// import './vue/fromCmsElement'
///////////////////////////////////

// app.js
import {createApp} from 'vue';
import axios from 'axios';

const createCmsForm = createApp({
    // delimiters: ['${', '}'],
    data() {
        return {
            cmsForm: {
                stepOne: {
                    pluginTechnicalName: "",
                    version: "",
                    pluginDescription: "",
                    pluginLabelDE: "",
                    pluginLabelEN: "",
                },
                stepTwo: {
                    cmsElementTechnicalName: "",
                    cmsElementLabelDE: "",
                    cmsElementLabelEN: "",
                    cmsPreviewImage: "",
                    cmsDefaultPreviewImage: "",
                    cmsComponentImage: "",
                    cmsDefaultComponentImage: "",
                },
                stepThree: {
                    fieldCounter: 0,
                    fieldTechnicalName: "",
                    fields: [],
                },
                stepFour: {
                    cmsBlocksTechnicalName: "",
                    cmsBlocksLabelDE: "",
                    cmsBlocksLabelEN: "",
                    cmsBlocksCategory: "",
                },
            },
            formOptions: {
                stepOne: {
                    status: true,
                },
                stepTwo: {
                    status: true,
                },
                stepThree: {
                    status: true,
                    fieldComponents: {
                        "sw-text-field": "sw-text-field",
                        "sw-text-editor": "sw-text-editor",
                        "sw-media-field": "sw-media-field",
                        "sw-media-upload-v2": "sw-media-upload-v2",
                        "sw-checkbox-field": "sw-checkbox-field",
                        "sw-switch-field": "sw-switch-field",
                        "sw-colorpicker": "sw-colorpicker",
                    },
                },
                stepFour: {
                    status: true,
                    cmsBlocksCategoryList: {
                        textImage: "text-Image",
                        text: "text",
                        video: "video",
                        image: "image",
                    },
                }
            },
            errorMsg: {
                msg: [],
                status: false,
            },
            infoMsg: {
                msg: "",
                status: false,
            },
            currentTab: 1,
            status: true,
        };
    },
    computed: {
        validationErrors() {
            const errors = [];
            if (!this.cmsForm.stepOne.version || !this.cmsForm.stepOne.version.match(/^[0-9.]+$/)) {
                errors.push({msg: "Version darf nicht leer sein", version: false});
            }
            if (!this.cmsForm.stepOne.pluginTechnicalName) {
                errors.push({msg: "pluginTechnicalName darf nicht leer sein", pluginTechnicalName: false});
            }

            if (!this.cmsForm.stepTwo.cmsElementTechnicalName.match(/[a-zA-Z0-9-]+/)) {
                errors.push({
                    msg: "Kein leerzeichen oder unzulässig sondernzeichen oder _ , nur - ist empfohlen ",
                    cmsElementTechnicalName: false
                });
            }
            return errors;
        },
        isValid() {
            return this.validationErrors.length === 0;
        },
    },
    created() {

    },
    methods: {
        addFields() {
            let fieldCounter = this.cmsForm.stepThree.fieldCounter += 1;
            this.cmsForm.stepThree.fields.push({
                fieldId: fieldCounter,
                fieldTechnicalName: this.cmsForm.stepThree.fields.fieldTechnicalName,
                fieldLabel: this.cmsForm.stepThree.fields.fieldLabel,
                fieldComponent: this.cmsForm.stepThree.fields.fieldComponent,
                fieldRequired: this.cmsForm.stepThree.fields.fieldRequired,
            });
               this.cmsForm.stepThree.fields.fieldTechnicalName = "",
                this.cmsForm.stepThree.fields.fieldLabel = "",
                 this.cmsForm.stepThree.fields.fieldComponent="",
                this.cmsForm.stepThree.fields.fieldRequired = false

        },
        hasError(field) {
            return this.validationErrors.some((error) => error[field] === false);
        },
        transformName(cmsField) {
            let path = cmsField.split(".");
            let stepNumber = path[0];
            let fieldName = path[1];
            let str = this.cmsForm[stepNumber][fieldName];
            str = str.replace(/\s+(.)/g, (match) => match[1].toUpperCase());
            str = str.replace(/[^a-zA-Z0-9-]/g, "");
            this.cmsForm[stepNumber][fieldName] = str;
        },
        removeField(fieldId) {
            let index = this.cmsForm.stepThree.fields.findIndex(field => field.fieldId == fieldId);
            if (index !== -1) {
                this.cmsForm.stepThree.fields.splice(index, 1);
            }

        },
        transformCmsName(cmsField) {
            var path = cmsField.split(".");
            var stepNumber = path[0];
            var fieldName = path[1];
            let fieldValue = this.cmsForm[stepNumber][fieldName];
            fieldValue = fieldValue.toLowerCase();
            fieldValue = fieldValue.replace(/\s+/g, "-");
            fieldValue = fieldValue.replace(/^-+|-+$/g, "");
            fieldValue = fieldValue.replace(/[^a-zA-Z0-9-]/g, "");
            this.cmsForm[stepNumber][fieldName] = fieldValue; // Aktualisieren des ursprünglichen Feldes

        },

        sendData() {
            axios.post('/createcmselement', this.cmsForm
            ).then(response => {
                // console.log(response.data.msg)
                this.infoMsg.status = true;
                this.infoMsg.msg = response.data.msg;
            }).catch(error => {
                this.errorMsg.status = true;
                this.errorMsg.msg = "error";
                console.log(error)
            })
        },
        getTabsCount() {
            return document.getElementsByClassName("tabs").length;
        },
        goToNextTab() {
            if (this.currentTab < this.getTabsCount()) {
                this.currentTab++;
            }
        },
        goToPreviousTab() {
            if (this.currentTab > 1) {
                this.currentTab--;
            }
        },
    },
});
createCmsForm.mount("#createCmsForm");