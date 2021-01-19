<template>
    <div>
        <div class="row">
            <div class="col-md-4" v-for="post in posts" >
                <post-card :post="post"></post-card>
            </div>
        </div>
        <div class="row justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="page === 1 ? 'disabled' : ''"><a class="page-link" @click="getPosts(page - 1)" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" @click="getPosts(page - 2)" href="#" v-show="page > 2">{{ page - 2 }}</a></li>
                    <li class="page-item"><a class="page-link" @click="getPosts(page - 1)" href="#" v-show="page > 1">{{ page - 1 }}</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">{{ page }}</a></li>
                    <li class="page-item"><a class="page-link" @click="getPosts(page + 1)" href="#" v-show="lastPage - page > 0">{{ page + 1 }}</a></li>
                    <li class="page-item"><a class="page-link" @click="getPosts(page + 2)" href="#" v-show="lastPage - page > 1">{{ page + 2 }}</a></li>
                    <li class="page-item" :class="page === lastPage ? 'disabled' : ''"><a class="page-link" @click="getPosts(page + 1)" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</template>
<script>
export default {
    name: "latest",
    data() {
        return {
            posts : [],
            page : 1,
            links : null,
            lastPage : null,
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1){
            this.page = page;
            this.axios.post(`/api/posts/paginate?page=${page}`)
                .then(response => {
                    this.afterGetPosts(response.data)
                })
                .catch(error => {
                    alert('Error');
                });
        },
        afterGetPosts(response){
            this.posts = response.data;
            this.lastPage = response.last_page;
            this.links = response.links;
        }
    },
}
</script>
