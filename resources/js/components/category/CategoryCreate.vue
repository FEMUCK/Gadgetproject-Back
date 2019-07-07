<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                สร้างหมวดหมู่
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
                                        <div class="col-lg-12">
                                        <button v-on:click="createCategory()" type="button" class="mt-2 btn btn-success btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">สร้างหมวดหมู่</button>
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
    export default {
        data()  {
            return {
                categoryName:'',
                errors:[],
            }
        },
        methods:{
            createCategory()    {
                axios.post('/api/category',{
                    categoryName:this.categoryName,
                }).then(response=>{
                    this.$router.push('/category');
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            }
        }
    }
</script>