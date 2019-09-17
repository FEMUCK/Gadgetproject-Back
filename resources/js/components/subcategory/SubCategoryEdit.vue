<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                สร้างหมวดหมู่ย่อย
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
                                                <input v-model="subCategoryName" type="text" class="form-control form-control-pill" placeholder="ชื่อหมวดหมู่ย่อย">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.subCategoryName" class="error">{{errors.subCategoryName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <input v-model="subCategoryIcon" type="text" class="form-control form-control-pill" placeholder="ไอคอน (font-awesome)">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.subCategoryIcon" class="error">{{errors.subCategoryIcon}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>หมวดหมู่ *</label>
                                                <select class="form-control form-control-pill" v-model="subCategoryMain">
                                                    <option :value="categoryList._id" v-for="(categoryList,index) in categoryLists">{{categoryList.name}}</option>
                                                </select>
                                            </div>
                                            <span v-if="errors.subCategoryMain" class="error">{{errors.subCategoryMain}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <label>รูปภาพ</label>
                                        <vue-dropzone @vdropzone-success="success" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                                        <span v-if="errors.imageName" class="error">{{errors.imageName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <button v-on:click="editSubCategory()" type="button" class="btn btn-warning btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">แก้ไขหมวดหมู่ย่อย</button>
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
        components: {
            vueDropzone: vue2Dropzone
        },
        mounted() {
            this.getSubCategoryInfo();
            this.getCategoryList();
        },
        data()  {
            return {
                subCategoryName:'',
                subCategoryIcon:'',
                subCategoryMain:'',
                categoryLists:[],
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
            getSubCategoryInfo() {
                axios.get('/api/sub-category/'+this.$route.params.id+'/edit').then(response=>{
                    this.subCategoryName = response.data.name;
                    this.subCategoryIcon = response.data.icon;
                    this.subCategoryMain = response.data.category_id;
                    this.imageName = response.data.image;
                });
            },
            getCategoryList() {
                axios.get('/api/category').then(response=>{
                    this.categoryLists=response.data;
                });
            },
            editSubCategory()    {
                axios.put('/api/sub-category/'+this.$route.params.id,{
                    subCategoryName:this.subCategoryName,
                    subCategoryIcon:this.subCategoryIcon,
                    subCategoryMain:this.subCategoryMain,
                    imageName:this.imageName,
                }).then(response=>{
                    this.$router.push('/admin/sub-category')
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            success: function(file, response)
                {
                    this.imageName=response;
                }
        }
    }
</script>