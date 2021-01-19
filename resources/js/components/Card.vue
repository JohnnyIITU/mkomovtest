<template>
    <div class="card mb-3 mt-3">
        <img class="card-img-top" :src="post.image" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text">{{post.text.substr(0, 300)}}</p>
            <a :href="`/posts/${post.id}`">Read more</a>
        </div>
    </div>
</template>
<script>
export default {
    name: "PostCard",
    data() {
        return {
        };
    },
    props : {
        post : Object
    },
    methods: {
    },
}
</script>
