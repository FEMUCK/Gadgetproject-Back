<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                แก้ไขหมวดหมู่
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
                                                <input v-model="categoryName" type="text" class="form-control form-control-pill" placeholder="ชื่อหมวดหมู่">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.categoryName" class="error">{{errors.categoryName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <input v-model="categoryIcon" type="text" class="form-control form-control-pill" placeholder="ไอคอน (font-awesome)">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.categoryIcon" class="error">{{errors.categoryIcon}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <label>รูปภาพ</label>
                                        <vue-dropzone @vdropzone-success="success" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                                        <span v-if="errors.imageName" class="error">{{errors.imageName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <button v-on:click="editCategory()" type="button" class="btn btn-warning btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">แก้ไขหมวดหมู่</button>
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
            this.getCategoryInfo();
        },
        components: {
            vueDropzone: vue2Dropzone
        },
        data()  {
            return {
                categoryName:'',
                categoryIcon:'',
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
            getCategoryInfo() {
                axios.get('/api/category/'+this.$route.params.id+'/edit').then(response=>{
                    this.categoryName=response.data.name;
                    this.categoryIcon=response.data.icon
                    this.imageName=response.data.imageName;
                });
            },
            success: function(file, response)
                {
                    this.imageName=response;
                },
            editCategory()  {
                axios.put('/api/category/'+this.$route.params.id,{
                    categoryName:this.categoryName,
                    categoryIcon:this.categoryIcon,
                    imageName:this.imageName,
                }).then(response=>{
                    this.$router.push('/category')
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            }
        }
    }
</script>