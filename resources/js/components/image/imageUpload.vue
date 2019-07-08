<template>
<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
</template>
<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function () {
    return {
      dropzoneOptions: {
          url: '/api/image',
          thumbnailWidth: 150,
          maxFilesize: 2,
          maxFile:1,
          addRemoveLinks: true,
      }
    }
  }
}
</script>