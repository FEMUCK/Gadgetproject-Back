<template>
    <div class="kt-container mt-3">
        <div class="row">
            <div class="col-xl-6">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                แก้ไขข้อมูลสมาชิก
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form class="kt-form">
                            <div class="kt-grid kt-grid--desktop kt-grid--ver-desktop">
                                <div class="kt-grid__item kt-grid__item--middle">
                                    <div class="row kt-margin-r-10">
                                        <div class="col-lg-12">
                                            <label>ระดับ</label>
                                            <div class="kt-input-icon kt-input-icon--pill kt-input-icon--right">
                                                <select v-model="memberTier" class="form-control form-control-pill">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                </select>
                                            </div>
                                            <span v-if="errors.memberTier" class="error">{{errors.memberTier}}</span>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                        <button v-on:click="editMember()" type="button" class="btn btn-warning btn-pill btn-upper btn-bold btn-font-sm kt-subheader-search__submit-btn">แก้ไขข้อมูล</button>
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
        mounted() {
            this.getMemberInfo();
        },
        data()  {
            return {
                errors:[],
                memberTier:'',
            }
        },
        methods:{
            getMemberInfo() {
                axios.get('/api/member/'+this.$route.params.id+'/edit').then(response=>{
                    this.memberTier=response.data;
                });
            },
            editMember()  {
                axios.put('/api/member/'+this.$route.params.id,{
                    memberTier:this.memberTier,
                }).then(response=>{
                    this.$router.push('/admin/member')
                }).catch(error=>{
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            }
        }
    }
</script>