<template>

</template>

<script>
    import Form from "../../classes/Form";
    import axios from "axios"

    export default {
        data() {
            return {
                form: new Form(),
                formData: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            submitForm() {
                let targetUrl = 'http://lts.test/api/v2/login';
                let redirectUrl = 'http://lts.test/v2';
                axios.post(targetUrl, this.formData).then((response)=>{
                  const token = response.data.data.token;
                    window.localStorage.setItem('token', token);
                    console.log(response.data);
                    // window.location= redirectUrl
                })


                // this.form = new Form(this.formData);
                // this.form.submit('post', targetUrl);
            },
        }
    }
</script>

<style scoped>

</style>

