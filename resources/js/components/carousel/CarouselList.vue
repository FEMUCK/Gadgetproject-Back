<template>
    <div class="kt-container mt-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                                            สไลด์
                                                        </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <router-link to="/admin/carousel/create" class="nav-link active">
                                        สร้างสไลด์
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
                                                    <td style="width:20%">รูป</td>
                                                    <td style="width:5%">ชื่อสไลด์</td>
                                                    <td style="width:15%">ตำแหน่ง</td>
                                                    <td style="width:15%">แก้ไข</td>
                                                    <td style="width:15%">ลบ</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(carouselList,index) in carouselLists">
                                                    <td>
                                                        <label class="kt-checkbox kt-checkbox--single">
                                                            {{index+1}}
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <img class="img-thumb" :src="'https://gadgetproject-storage.sgp1.digitaloceanspaces.com/image/'+carouselList.image">
                                                    </td>
                                                    <td><span class="kt-widget11__sub">{{carouselList.name}}</span></td>
                                                    <td>{{carouselList.arrange}}</td>
                                                    <td><router-link class="btn btn-pill btn-warning" :to="'/admin/carousel/'+carouselList._id+'/edit'">แก้ไข</router-link></td>
                                                    <td><button v-on:click="deleteCarousel(carouselList._id)" type="button" class="btn btn-pill btn-danger">ลบ</button></td>
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

<style scope>
.img-thumb {
    width:100;
    height:100px;
}
</style>

<script>
    export default {
        mounted() {
            this.getCarouselList();
        },
        data()  {
            return {
                carouselLists:[],
                carouselList:{
                    _id:'',
                    name:'',
                    image:'',
                    arrange:'',
                }
            }
        },
        methods: {
            getCarouselList() {
                axios.get('/api/carousel').then(response=>{
                    this.carouselLists=response.data;
                });
            },
            deleteCarousel(index)    {
                axios.delete('/api/carousel/'+index).then(response=>{
                    this.carouselLists=response.data;
                });
            }
        }
    }
</script>