<template>
    <div class="kt-container mt-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                                            สินค้า
                                                        </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <router-link to="/admin/product/create" class="nav-link active">
                                        สร้างสินค้า
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--Begin::Tab Content-->
                        <div class="tab-content">

                            <!--begin::tab 1 content-->
                            <div class="tab-pane active" id="kt_widget11_tab1_content">

                                <!--begin::Widget 11-->
                                <div class="kt-widget11">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td style="width:5%">ลำดับ</td>
                                                    <td style="width:15%">รูป</td>
                                                    <td style="width:15%">ชื่อสินค้า</td>
                                                    <td style="width:15%">หมวดหมู่</td>
                                                    <td style="width:15%">ราคา (ระดับ1)</td>
                                                    <td style="width:15%">จำนวน</td>
                                                    <td style="width:10%">แก้ไข</td>
                                                    <td style="width:10%">ลบ</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(productList,index) in productLists">
                                                    <td>
                                                        <label class="kt-checkbox kt-checkbox--single">
                                                            {{index+1}}
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <img class="img-thumb" :src="/storage/+productList.image">
                                                    </td>
                                                    <td><span class="kt-widget11__sub">{{productList.name}}</span></td>
                                                    <td>{{productList.category}}</td>
                                                    <td>{{productList.price1}}</td>
                                                    <td>{{productList.quantity}}</td>
                                                    <td><router-link class="btn btn-pill btn-warning" :to="'/admin/product/'+productList._id+'/edit'">แก้ไข</router-link></td>
                                                    <td><button v-on:click="deleteProduct(productList._id)" type="button" class="btn btn-pill btn-danger">ลบ</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--end::Widget 11-->
                            </div>

                            <!--end::tab 1 content-->
                        </div>
                        <!--End::Tab Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getProductList();
    },
    data()  {
        return {
            productLists:[],
            productList:{
                _id:'',
                name:'',
                category:'',
                image:'',
                price1:'',
                quantity:'',
            }
        }
    },
    methods: {
        getProductList()    {
            axios.get('/api/product').then(response=>{
                this.productLists=response.data;
            });
        },
        deleteProduct(id)   {
            axios.delete('/api/product/'+id).then(response=>{
                this.productLists=response.data;
            });
        }
    }
}
</script>