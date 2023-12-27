
const app = Vue.createApp({

   data() {
      return {
         cmsForm: {
            stepOne: {
               status: true,
               pluginTechnicalName: "",
               version: "",
               pluginDescription: "",
               pluginLabelDE: "",
               pluginLabelEN: "",

            },
            stepTwo: {
               status: true,
               cmsElementTechnicalName: "",
               cmsElementLabelDE: "",
               cmsElementLabelEN: "",
               cmsPreviewImage: "",
               cmsDefaultPreviewImage: "",
               cmsComponentImage: "",
               cmsDefaultComponentImage: "",
            },
            stepThree: {
               status: true,
            },
            stepFour: {
               status: true,
               cmsBlocksTechnicalName: "",
               cmsBlocksLabelDE: "",
               cmsBlocksLabelEN: "",
               cmsBlocksCategory: "",
               cmsBlocksCategoryList: {
                  textImage: "text-Image",
                  text: "text",
                  video: "video",
                  image: "image",
               }
            },

         },
         errorMsg: {
            msg: [],
            status: false
         },
         infoMsg: {
            msg: "",
            status: false
         },
         currentTab: 1,
         status: true,

      }
   },
   computed: {
      validationErrors() {
         const errors = [];
         if (!this.cmsForm.stepOne.version || ! this.cmsForm.stepOne.version.match(/^[0-9.]*$/)) {
            errors.push({ msg: "Version darf nicht leer sein" ,version: false});
         }
         if (!this.cmsForm.stepOne.pluginTechnicalName) {
            errors.push({ msg: "pluginTechnicalName darf nicht leer sein",pluginTechnicalName:false } );
         }
         console.log(errors)
         return errors;
      },
      isValid() {
         return this.validationErrors.length === 0;
      },
   },
   created() {

   },
   methods: {
      hasError(field) {
         return this.validationErrors.some( error =>
            error[field]===false
         )
      },

      sendData(e) {
         e.preventDefault();
         axios.post('/post', {

         }, {
            headers: {
               'Content-Type': 'application/json'
            }
         }
         )


      },
      getTabsCount() {
         return document.getElementsByClassName("tabs").length;
      },
      goToNextTab() {
         if (this.currentTab < this.getTabsCount()) {
            this.currentTab++
         }
         console.log(this.currentTab)
      },
      goToPreviousTab() {
         if (this.currentTab > 1) {
            this.currentTab--
            console.log(this.currentTab)

         }
      }
   }



})
app.mount('#app');

// let tabs = document.getElementsByClassName(".tabs").length;

// console.log(tabs)