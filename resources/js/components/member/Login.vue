<template>
            <div class="container container-fluid bg-main">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-5 box">
                        <h1>Login</h1>
                        <div v-if="this.loginError" class="alert alert-danger" role="alert">
                            {{ this.loginError }}
                        </div>
                        <hr>
                        <form class="mt-5">
                            <div class="form-group">
                                <label>อีเมลล์</label>
                                <input v-model="loginEmail" type="email" class="form-control form-control-pill" placeholder="กรุณากรอกอีเมลล์">
                                <span v-if="errors.loginEmail" class="error">{{errors.loginEmail}}</span>
                            </div>
                            <div class="form-group">
                                <label>พาสเวิร์ด</label>
                                <input v-model="loginPassword" type="password" class="form-control form-control-pill" placeholder="กรุณากรอกพาสเวิร์ด">
                                <span v-if="errors.loginPassword" class="error">{{errors.loginPassword}}</span>
                            </div>
                            <hr>
                            <button v-on:click="Login()" type="button" class="form-control btn btn-success btn-pill">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
</template>

<style scope>
.box {
    padding:25px;
    border-radius:10px;
    background:white !important;
}
body {
    background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(28,142,210,1) 0%, rgba(113,192,244,1) 47.3%, rgba(139,238,230,1) 88.4% );
}
</style>

<script>
    export default {
        data() {
            return {
                loginEmail:'',
                loginPassword:'',

                errors:[],

                loginError:'',
            }
        },
        methods:{
            Login() {
                axios.post('/api/admin/login',{
                        loginEmail:this.loginEmail,
                        loginPassword:this.loginPassword
                    }).then(response=>{
                    localStorage.login = true;
                    localStorage.email = response.data.email;
                    localStorage.firstname = response.data.firstname;
                    localStorage.lastname = response.data.lastname;
                    this.$router.push('/admin/dashboard');
                }).catch(error=>{
                    if(error.response.status == 401) {
                        this.loginError = error.response.data.message;
                    }
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
            }
        }
    }
</script>