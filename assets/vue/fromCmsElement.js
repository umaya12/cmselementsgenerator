import { createApp } from 'vue';
const createCmsForm = Vue.createApp({
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
               fieldTypes: {
                  "Text-Editor": "Text-Editor",
                  "Input-Text": "Input-Text",
                  "color": "color",
                  "Media-Simple": "Media-Simple",
                  "Media-Advanced": "Media-Advanced",
                  "input-check": "input-check",
                  "input-number": "input-number",
                  "input-slide": "input-slide",
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
            errors.push({ msg: "Version darf nicht leer sein", version: false });
         }
         if (!this.cmsForm.stepOne.pluginTechnicalName) {
            errors.push({ msg: "pluginTechnicalName darf nicht leer sein", pluginTechnicalName: false });
         }

         if (!this.cmsForm.stepTwo.cmsElementTechnicalName.match(/[a-zA-Z0-9-]+/)) {
            errors.push({ msg: "Kein leerzeichen oder unzulässig sondernzeichen oder _ , nur - ist empfohlen ", cmsElementTechnicalName: false });
         }

         return errors;
      },
      isValid() {
         return this.validationErrors.length === 0;
      },
   },
   created() { console.log(this.cmsForm) },
   methods: {
      addFields() {
         let fieldCounter = this.cmsForm.stepThree.fieldCounter += 1;
         this.cmsForm.stepThree.fields.push({
            fieldId: fieldCounter,
            fieldTechnicalName: this.cmsForm.stepThree.fields.fieldTechnicalName,
            fieldLabel: this.cmsForm.stepThree.fields.fieldLabel,
            fieldTechnicalType: this.cmsForm.stepThree.fields.fieldTechnicalType,
            fieldRequired: this.cmsForm.stepThree.fields.fieldRequired,
         });
         this.cmsForm.stepThree.fields.fieldTechnicalName = "",
            this.cmsForm.stepThree.fields.fieldLabel = "",
            this.cmsForm.stepThree.fields.fieldTechnicalType = "",
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
         axios.post('{{path("app.send.data")}}', this.cmsForm
         ).then(response => { console.log(response) }).catch(error => {
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

 alert(34987)