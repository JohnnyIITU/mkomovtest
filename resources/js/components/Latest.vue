<template>
    <div class="row">
        <div class="col-md-4" v-for="post in posts" >
            <post-card :post="post"></post-card>
        </div>
    </div>
</template>
<script>
export default {
    name: "latest",
    data() {
        return {
            posts : []
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts(){
            this.axios.post('/api/posts/latest')
                .then(response => {
                    this.afterGetPosts(response.data)
                })
                .catch(error => {
                    alert('Error');
                });
        },
        afterGetPosts(response){
            this.posts = response;
        }
    },
}
</script>
