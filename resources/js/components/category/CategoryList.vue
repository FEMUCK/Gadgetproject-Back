<template>
    <div class="kt-container mt-5">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                                            หมวดหมู่
                                                        </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <router-link to="/category/create" class="nav-link active">
                                        สร้างหมวดหมู่
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
                                                    <td style="width:15%">ลำดับ</td>
                                                    <td style="width:25%">รูป</td>
                                                    <td style="width:15%">ชื่อหมวดหมู่</td>
                                                    <td style="width:15%">รายละเอียด</td>
                                                    <td style="width:15%">แก้ไข</td>
                                                    <td style="width:15%">ลบ</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="categoryList in categoryLists">
                                                    <td>
                                                        <label class="kt-checkbox kt-checkbox--single">
                                                            <input type="checkbox"><span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="kt-widget11__sub">{{categoryList.name}}</span>
                                                    </td>
                                                    <td>19,200</td>
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
            this.getCategoryList();
        },
        data()  {
            return {
                categoryLists:[],
                categoryList:{
                    name:'',
                }
            }
        },
        methods: {
            getCategoryList() {
                axios.get('/api/category').then(response=>{
                    this.categoryLists=response.data;
                });
            }
        }
    }
</script>