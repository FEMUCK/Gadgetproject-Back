<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                แก้ไขสินค้า
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
                                                <label>ชื่อสินค้า *</label>
                                                <input v-model="productName" type="text" class="form-control form-control-pill" placeholder="ชื่อสินค้า">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productName" class="error">{{errors.productName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>หมวดหมู่ *</label>
                                                <select class="form-control form-control-pill" v-model="productCategory">
                                                    <option :value="categoryList.name" v-for="(categoryList,index) in categoryLists">{{categoryList.name}}</option>
                                                </select>
                                            </div>
                                            <span v-if="errors.productCategory" class="error">{{errors.productCategory}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>คำอธิบาย</label>
                                                <textarea v-model="productDescription" class="form-control form-control-pill" rows="8"></textarea>
                                            </div>
                                            <span v-if="errors.productDescription" class="error">{{errors.productDescription}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 1 *</label>
                                                <input v-model="productPrice_1" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ1">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_1" class="error">{{errors.productPrice_1}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 2</label>
                                                <input v-model="productPrice_2" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ2">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_2" class="error">{{errors.productPrice_2}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 3</label>
                                                <input v-model="productPrice_3" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ3">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_3" class="error">{{errors.productPrice_3}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 4</label>
                                                <input v-model="productPrice_4" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ4">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_4" class="error">{{errors.productPrice_4}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 5</label>
                                                <input v-model="productPrice_5" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ5">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_5" class="error">{{errors.productPrice_5}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 6</label>
                                                <input v-model="productPrice_6" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ6">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_6" class="error">{{errors.productPrice_6}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ระดับ 7</label>
                                                <input v-model="productPrice_7" type="number" class="form-control form-control-pill" placeholder="ราคาสินค้า ระดับ7">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productPrice_7" class="error">{{errors.productPrice_7}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>ส่วนลด (บาท)</label>
                                                <input v-model="productDiscount" type="number" class="form-control form-control-pill" placeholder="ส่วนลด">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productDiscount" class="error">{{errors.productDiscount}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <label>สต๊อก *</label>
                                                <input v-model="productQuantity" type="number" class="form-control form-control-pill" placeholder="จำนวน">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-puzzle-piece"></i></span></span>
                                            </div>
                                            <span v-if="errors.productQuantity" class="error">{{errors.productQuantity}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <label>รูปภาพ *</label>
                                        <vue-dropzone @vdropzone-success="success" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                                        <span v-if="errors.imageName" class="error">{{errors.imageName}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <button v-on:click="editProduct()" type="button" class="btn btn-warning btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">แก้ไขสินค้า</button>
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
            this.getCategoryList();
            this.getProductInfo();
        },
        data()  {
            return {
                categoryList:{
                    _id:'',
                    name:'',
                },

                productName:'',
                productCategory:'',
                productDescription:'',
                productPrice_1:'',
                productPrice_2:'',
                productPrice_3:'',
                productPrice_4:'',
                productPrice_5:'',
                productPrice_6:'',
                productPrice_7:'',
                productDiscount:'',
                productQuantity:'',
                imageName:[],

                errors:[],

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
            getProductInfo()    {
                axios.get('/api/product/'+this.$route.params.id+'/edit').then(response=>{
                    this.productName=response.data.name;
                    this.productCategory=response.data.category;
                    this.productDescription=response.data.description;
                    this.productPrice_1=response.data.price1;
                    this.productPrice_2=response.data.price2;
                    this.productPrice_3=response.data.price3;
                    this.productPrice_4=response.data.price4;
                    this.productPrice_5=response.data.price5;
                    this.productPrice_6=response.data.price6;
                    this.productPrice_7=response.data.price7;
                    this.productDiscount=response.data.discount;
                    this.productQuantity=response.data.quantity;
                    this.imageName=response.data.image;
                });
            },
            getCategoryList() {
                axios.get('/api/category').then(response=>{
                    this.categoryLists = response.data;
                });
            },
            editProduct()    {
                axios.put('/api/product/'+this.$route.params.id,{
                    productName:this.productName,
                    productCategory:this.productCategory,
                    productDescription:this.productDescription,
                    productPrice_1:this.productPrice_1,
                    productPrice_2:this.productPrice_2,
                    productPrice_3:this.productPrice_3,
                    productPrice_4:this.productPrice_4,
                    productPrice_5:this.productPrice_5,
                    productPrice_6:this.productPrice_6,
                    productPrice_7:this.productPrice_7,
                    productDiscount:this.productDiscount,
                    productQuantity:this.productQuantity,
                    imageName:this.imageName,
                }).then(response=>{
                    this.$router.push('/product');
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            success: function(file, response)
                {
                    this.imageName=response;
                },
        }
    }
</script>