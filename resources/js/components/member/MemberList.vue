<template>
    <div class="kt-container mt-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                                            สมาชิก
                                                        </h3>
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
                                                    <td style="width:10%">ชื่อจริง</td>
                                                    <td style="width:10%">นามสกุล</td>
                                                    <td style="width:10%">อีเมลล์</td>
                                                    <td style="width:5%">ระดับ</td>
                                                    <td style="width:5%">ยืนยัน</td>
                                                    <td style="width:10%">แอดมิน</td>
                                                    <td style="width:10%">แก้ไขระดับ</td>
                                                    <td style="width:10%">อนุมัติ</td>
                                                    <td style="width:10%">เพิ่มเป็นแอดมิน</td>
                                                    <td style="width:5%">แบน</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(memberList,index) in memberLists">
                                                    <td>
                                                        <label class="kt-checkbox kt-checkbox--single">
                                                            {{index+1}}
                                                        </label>
                                                    </td>
                                                    <td>
                                                        {{memberList.firstname}}
                                                    </td>
                                                    <td>
                                                        {{memberList.lastname}}
                                                    </td>
                                                    <td>
                                                        {{memberList.email}}
                                                    </td>
                                                    <td>
                                                        {{memberList.tier}}
                                                    </td>
                                                    <td>
                                                        <span v-if="memberList.activate === true"><i class="fas fa-check"></i></span>
                                                        <span v-else><i class="fas fa-times"></i></span>
                                                    </td>
                                                    <td>
                                                        <span v-if="memberList.admin === true"><i class="fas fa-check"></i></span>
                                                        <span v-else><i class="fas fa-times"></i></span>
                                                    </td>
                                                    <td>
                                                     <router-link :to="'/member/'+memberList._id+'/edit'" class="btn btn-info btn-pill">แก้ไขระดับ</router-link>
                                                    </td>
                                                    <td>
                                                        <button v-on:click="memberCancleApprove(memberList._id)" v-if="memberList.activate === true" type="button" class="btn btn-pill btn-warning">ยกเลิกอนุมัติ</button>
                                                        <button v-on:click="memberApprove(memberList._id)" v-else type="button" class="btn btn-pill btn-success">อนุมัติ</button>
                                                    </td>
                                                    <td>
                                                        <button v-on:click="memberCancleAdmin(memberList._id)" v-if="memberList.admin === true" type="button" class="btn btn-pill btn-warning">ปลดแอดมิน</button>
                                                        <button v-on:click="memberAdmin(memberList._id)" v-else type="button" class="btn btn-pill btn-primary">ตั้งเป็นแอดมิน</button>
                                                    </td>
                                                    <td>
                                                        <button v-on:click="memberCancleBan(memberList._id)" v-if="memberList.ban === true" type="button" class="btn btn-pill btn-warning">ปลดแบน</button>
                                                        <button v-on:click="memberBan(memberList._id)" v-else type="button" class="btn btn-pill btn-danger">แบน</button>
                                                    </td>
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
        this.getMemberList();
    },
    data()  {
        return {
            memberLists:[],
            memberList: {
                _id:'',
                firstname:'',
                lastname:'',
                email:'',
                phone:'',
                activate:'',
                admin:'',
                ban:''
            }
        }
    },
    methods: {
        getMemberList() {
            axios.get('/api/member').then(response=>{
                this.memberLists=response.data;
            });
        },
        memberApprove(id) {
            axios.post('/api/member/approve/'+id).then(response=>{
                this.memberLists=response.data;
            });
        },
        memberCancleApprove(id) {
            axios.post('/api/member/cancle-approve/'+id).then(response=>{
                this.memberLists=response.data;
            })
        },
        memberAdmin(id) {
            axios.post('/api/member/admin/'+id).then(response=>{
                this.memberLists=response.data;
            });
        },
        memberCancleAdmin(id) {
            axios.post('/api/member/cancle-admin/'+id).then(response=>{
                this.memberLists=response.data;
            });
        },
        memberBan(id)   {
            axios.post('/api/member/ban/'+id).then(response=>{
                this.memberLists=response.data;
            });
        },
        memberCancleBan(id)   {
            axios.post('/api/member/cancle-ban/'+id).then(response=>{
                this.memberLists=response.data;
            });
        }
    }
}
</script>