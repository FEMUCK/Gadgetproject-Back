<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                แก้ไขแบนเนอร์
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form class="kt-form">
                            <div class="kt-grid kt-grid--desktop kt-grid--ver-desktop">
                                <div class="kt-grid__item kt-grid__item--middle">
                                    <div class="row kt-margin-r-10">
                                        <div class="col-lg-12">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ชื่อแบนเนอร์</label>
                                                <input v-model="bannerName" type="text" class="form-control form-control-pill" placeholder="ชื่อแบนเนอร์">
                                            </div>
                                            <span v-if="errors.bannerName" class="error">{{errors.bannerName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ตำแหน่ง</label>
                                                <input v-model="bannerArrange" type="number" class="form-control form-control-pill" placeholder="ตำแหน่ง">
                                            </div>
                                            <span v-if="errors.bannerArrange" class="error">{{errors.bannerArrange}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ลิงค์</label>
                                                <input v-model="bannerLink" type="text" class="form-control form-control-pill" placeholder="ลิงค์">
                                            </div>
                                            <span v-if="errors.bannerLink" class="error">{{errors.bannerLink}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <label>รูปภาพ *</label>
                                        <vue-dropzone @vdropzone-success="success" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                                        <span v-if="errors.image" class="error">{{errors.image}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <button v-on:click="editBanner()" type="button" class="btn btn-warning btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">แก้ไขแบนเนอร์</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        mounted() {
            this.getCarouselInfo();
        },
        components: {
            vueDropzone: vue2Dropzone
        },
        data()  {
            return {

                bannerName:'',
                bannerArrange:'',
                bannerLink:'',
                errors:[],
                imageName:[],

                dropzoneOptions: {
                url: '/api/image',
                thumbnailWidth: 150,
                maxFilesize: 2,
                maxFile:1,
                addRemoveLinks: true,
                },
            }
        },
        methods:{
            getCarouselInfo()   {
                axios.get('/api/banner/'+this.$route.params.id+'/edit').then(response=>{
                    this.bannerName = response.data.name;
                    this.bannerArrange = response.data.arrange;
                    this.bannerLink = response.data.link;
                    this.image = response.data.image;
                });
            },
            editBanner()    {
                axios.put('/api/banner/'+this.$route.params.id,{
                    image:this.image,
                    bannerName:this.bannerName,
                    bannerArrange:this.bannerArrange,
                    bannerLink:this.bannerLink,
                }).then(response=>{
                    this.$router.push('/admin/banner');
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            success: function(file, response)
                {
                    this.image=response;
                }
        }
    }
</script>